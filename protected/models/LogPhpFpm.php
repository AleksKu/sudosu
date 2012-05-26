<?php

/**
 * This is the model class for table "log_php_fpm".
 *
 * The followings are the available columns in table 'log_php_fpm':
 * @property integer $log_id
 * @property string $message
 * @property string $trace
 * @property string $file
 * @property string $level
 *
 * The followings are the available model relations:
 * @property Log $log
 */
class LogPhpFpm extends Log
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return LogPhpFpm the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    function defaultScope(){
        return array(
            'condition'=>"type='php_fpm'",
        );
    }
	


	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('log_id', 'required'),
			array('log_id', 'numerical', 'integerOnly'=>true),
			array('file, level', 'length', 'max'=>255),
			array('message, trace', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('log_id, message, trace, file, level', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
/*	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'log' => array(self::BELONGS_TO, 'Log', 'log_id'),
		);
	}*/

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'log_id' => 'Log',
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

		$criteria->compare('log_id',$this->log_id);
		$criteria->compare('message',$this->message,true);
		$criteria->compare('trace',$this->trace,true);
		$criteria->compare('file',$this->file,true);
		$criteria->compare('level',$this->level,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}