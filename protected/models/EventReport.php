<?php

/**
 * This is the model class for table "event_report".
 *
 * The followings are the available columns in table 'event_report':
 * @property string $id
 * @property string $message
 * @property string $hash
 * @property integer $count
 * @property string $last_date
 * @property string $host
 * @property integer $priority
 * @property string $type
 */
class EventReport extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return EventReport the static model class
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
		return 'event_report';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('last_date', 'required'),
			array('count, priority', 'numerical', 'integerOnly'=>true),
			array('hash, type', 'length', 'max'=>50),
			array('host', 'length', 'max'=>255),
			array('message', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, message, hash, count, last_date, host, priority, type', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
            'system_event'=>array(self::HAS_MANY, 'SystemEvents', 'event_report_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'message' => 'Message',
			'hash' => 'Hash',
			'count' => 'Count',
			'last_date' => 'Last Date',
			'host' => 'Host',
			'priority' => 'Priority',
			'type' => 'Type',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('message',$this->message,true);
		$criteria->compare('hash',$this->hash,true);
		$criteria->compare('count',$this->count);
		$criteria->compare('last_date',$this->last_date,true);
		$criteria->compare('host',$this->host,true);
		$criteria->compare('priority',$this->priority);
		$criteria->compare('type',$this->type,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}