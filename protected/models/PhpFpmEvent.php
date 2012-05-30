<?php

/**
 * This is the model class for table "php_fpm_event".
 *
 * The followings are the available columns in table 'php_fpm_event':
 * @property string $system_event_id
 * @property string $message
 * @property string $trace
 * @property string $file
 * @property string $level
 *
 * The followings are the available model relations:
 * @property SystemEvents $systemEvent
 */
class PhpFpmEvent extends DefinedEvent
{

    const TYPE = 'php_fpm';

    protected $regexp = '/^(?<pool>.*): (?<level>.+): (?<message>.+) in (?<file>.+)$/';

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return PhpFpmEvent the static model class
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
		return 'php_fpm_event';
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
			array('file, level', 'length', 'max'=>255),
			array('message, trace', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('system_event_id, message, trace, file, level', 'safe', 'on'=>'search'),
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
			'trace' => 'Trace',
			'file' => 'File',
			'level' => 'Level',
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
		$criteria->compare('trace',$this->trace,true);
		$criteria->compare('file',$this->file,true);
		$criteria->compare('level',$this->level,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}


    public function parseMessage()
    {

        preg_match($this->regexp, $this->systemEvent->Message, $out);


            $this->message = isset($out['message']) ? $out['message'] : null;
            $this->file = isset($out['file']) ? $out['file'] : null;
            $this->level = isset($out['level']) ? $out['level'] : null;




    }
}