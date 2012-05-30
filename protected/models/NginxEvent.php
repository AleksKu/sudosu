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
 * @property string $refferer
 *
 * The followings are the available model relations:
 * @property SystemEvents $systemEvent
 */
class NginxEvent extends DefinedEvent
{

    const TYPE = 'nginx';


    protected $regexp = '/^(?<dat>.*) \[(?<error_level>.+)\] (?<nubmer>.+): \*(?<nubmer2>.+) (?<message>.+), client: (?<client>.+), server: (?<server>.+), request: (?<request>.+), (?<other>.+)$/U';

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return NginxEvent the static model class
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
		return 'nginx_event';
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
			array('client, server, request, refferer', 'length', 'max'=>255),
			array('message', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('system_event_id, message, client, server, request, refferer', 'safe', 'on'=>'search'),
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
			'refferer' => 'Refferer',
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

		$criteria->compare('system_event_id',$this->system_event_id,true);
		$criteria->compare('message',$this->message,true);
		$criteria->compare('client',$this->client,true);
		$criteria->compare('server',$this->server,true);
		$criteria->compare('request',$this->request,true);
		$criteria->compare('refferer',$this->refferer,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}


    public function parseMessage()
    {

        preg_match($this->regexp, $this->systemEvent->Message, $out);


        $this->message = isset($out['message']) ? $out['message'] : null;
        $this->client = isset($out['client']) ? $out['client'] : null;
        $this->server = isset($out['server']) ? $out['server'] : null;
        $this->request = isset($out['request']) ? $out['request'] : null;
        $this->refferer = isset($out['refferer']) ? $out['refferer'] : null;


    }
}