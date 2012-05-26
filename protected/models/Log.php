<?php

/**
 * This is the model class for table "log".
 *
 * The followings are the available columns in table 'log':
 * @property integer $id
 * @property string $reported_time
 * @property integer $priority
 * @property string $host
 * @property string $full_message
 * @property string $type
 *
 * The followings are the available model relations:
 * @property LogNginx $logNginx
 * @property LogPhpFpm $logPhpFpm
 */
class Log extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Log the static model class
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
		return 'log';
	}

    /**
     * We're overriding this method to fill findAll() and similar method result
     * with proper models.
     *
     * @param array $attributes
     * @return Log
     */
    protected function instantiate($attributes){
        switch($attributes['type']){
            case 'nginx':
                $class='LogNginx';
                break;
            case 'php_fpm':
                $class='LogPhpFpm';
                break;
            default:
                $class=get_class($this);
        }
        $model=new $class(null);
        return $model;
    }


	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('priority', 'numerical', 'integerOnly'=>true),
			array('host', 'length', 'max'=>50),
			array('type', 'length', 'max'=>100),
			array('reported_time, full_message', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, reported_time, priority, host, full_message, type', 'safe', 'on'=>'search'),
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
			'logNginx' => array(self::HAS_ONE, 'LogNginx', 'log_id'),
			'logPhpFpm' => array(self::HAS_ONE, 'LogPhpFpm', 'log_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'reported_time' => 'Reported Time',
			'priority' => 'Priority',
			'full_message' => 'Message',
			'host' => 'Host',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('reported_time',$this->reported_time,true);
		$criteria->compare('priority',$this->priority);
		$criteria->compare('host',$this->host,true);
        $criteria->compare('full_message',$this->full_message,true);
		$criteria->compare('type',$this->type,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}




}