<?php

/**
 * This is the model class for table "nginx_event".
 *
 * The followings are the available columns in table 'nginx_event':
 * @property string $system_event_id
 * @property string $message
 * @property string $client
 * @property string $server
 * @property string $request
 * @property string $referrer
 *
 * @property string $type
 * @property string $hash
 * @property string $trace
 * @property string $level
 * @property string $file
 *
 * The followings are the available model relations:
 * @property SystemEvents $systemEvent
 */
class AdvancedSystemEvent extends CActiveRecord
{


    /**
     * @var int
     */
    public $eventCount = 0;
    public $host;
    public $receivedAt;

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AdvancedSystemEvent the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'advanced_system_event';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('system_event_id', 'required'),
			array('system_event_id', 'length', 'max'=>10),
			array('client, server, request, type, hash, file, level', 'length', 'max'=>255),
			array('trace, referrer', 'length', 'max'=>65000),
			array('message', 'safe'),

            // The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('system_event_id, message, client, server, request, referrer, type, hash, level, file, trace, host,receivedAt', 'safe', 'on'=>'search'),
		);
	}

    /**
     * We're overriding this method to fill findAll() and similar method result
     * with proper models.
     *
     * @param array $attributes
     * @return AdvancedSystemEvent
     */
    protected function instantiate($attributes){
        $class = AdvancedSystemEvent::getClassNameByType($attributes['type']);
        if(!$class)
            $class = 'AdvancedSystemEvent';

        $model=new $class(null);
        return $model;
    }


    /**
     * @static
     * @param $type
     * @return AdvancedSystemEvent
     */
    public static function getClassNameByType($type)
    {
        switch($type){
            case NginxSystemEvent::EVENT_TYPE:
                $class = 'NginxSystemEvent';
                break;
            case PhpFpmSystemEvent::EVENT_TYPE:
                $class ='PhpFpmSystemEvent';
                break;
            default:
                $class = null;
        }

        return $class;
    }


    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'systemEvent' => array(self::BELONGS_TO, 'SystemEvents', 'system_event_id'),
        );
    }



	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'system_event_id' => 'System Event',
			'message' => 'Message',
			'client' => 'Client',
			'server' => 'Server',
			'request' => 'Request',
			'referrer' => 'referrer',
		);
	}



	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

        $criteria->with = array('systemEvent');
		$criteria->compare('system_event_id',$this->system_event_id,true);

		$criteria->compare('systemEvent.FromHost',$this->host,true);
		$criteria->compare('systemEvent.ReceivedAt',$this->receivedAt,true);

		$criteria->compare('message',$this->message,true);
		$criteria->compare('client',$this->client,true);
		$criteria->compare('server',$this->server,true);
		$criteria->compare('request',$this->request,true);
		$criteria->compare('referrer',$this->referrer,true);
		$criteria->compare('type',$this->type,true);

        $criteria->order = 'system_event_id DESC';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'pagination' => array('pageSize' => 50,),
		));
	}

    public function parseSystemEventMessage($message)
    {
        return $this->message = $message;
    }


    public function hash()
    {
        return md5($this->message);
    }

    /**
     * scope для формирования отчета
     * @return AdvancedSystemEvent
     */
    public function forReport()
    {
        $this->getDbCriteria()->mergeWith(array(
            'select'=>'message,type, COUNT(*) AS eventCount',
            'group' => 'hash',
            'with'=>'systemEvent'
        ));
        return $this;
    }

    public function byType($type)
    {
        $this->getDbCriteria()->mergeWith(array(
            'condition' => "type='".$type."'"
        ));
        return $this;
    }



}