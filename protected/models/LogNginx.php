<?php

/**
 * This is the model class for table "log_nginx".
 *
 * The followings are the available columns in table 'log_nginx':
 * @property integer $log_id
 * @property string $message
 * @property string $client
 * @property string $server
 * @property string $request
 * @property string $refferer
 *
 * The followings are the available model relations:
 * @property Log $log
 */
class LogNginx extends Log
{


    function defaultScope(){
        return array(
            'condition'=>"type='nginx'",
        );
    }

    static function model($className=__CLASS__) {
        return parent::model($className);
    }

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		$rules= array(
			array('log_id', 'required'),
			array('log_id', 'numerical', 'integerOnly'=>true),
			array('client, server, request, refferer', 'length', 'max'=>255),
			array('message', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('log_id, message, client, server, request, refferer', 'safe', 'on'=>'search'),
		);

        return array_merge($rules, parent::rules());
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'log' => array(self::BELONGS_TO, 'Log', 'log_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		$labels = array(
			'log_id' => 'Log',
			'message' => 'Message',
			'client' => 'Client',
			'server' => 'Server',
			'request' => 'Request',
			'refferer' => 'Refferer',
		);

        return array_merge($labels, parent::attributeLabels());
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

		$criteria->compare('log_id',$this->log_id);
		$criteria->compare('message',$this->message,true);
		$criteria->compare('client',$this->client,true);
		$criteria->compare('server',$this->server,true);
		$criteria->compare('request',$this->request,true);
		$criteria->compare('refferer',$this->refferer,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}



    public function getRegexp()
    {
        return '/^(?<dat>.*) \[(?<error_level>.+)\] (?<nubmer>.+): \*(?<nubmer2>.+) (?<message>.+), (?<other>.+)$/U';
    }
}