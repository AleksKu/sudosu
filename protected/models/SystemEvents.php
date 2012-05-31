<?php

/**
 * This is the model class for table "SystemEvents".
 *
 * The followings are the available columns in table 'SystemEvents':
 * @property string $ID
 * @property string $CustomerID
 * @property string $ReceivedAt
 * @property string $DeviceReportedTime
 * @property integer $Facility
 * @property integer $Priority
 * @property string $FromHost
 * @property string $Message
 * @property integer $NTSeverity
 * @property integer $Importance
 * @property string $EventSource
 * @property string $EventUser
 * @property integer $EventCategory
 * @property integer $EventID
 * @property string $EventBinaryData
 * @property integer $MaxAvailable
 * @property integer $CurrUsage
 * @property integer $MinUsage
 * @property integer $MaxUsage
 * @property integer $InfoUnitID
 * @property string $SysLogTag
 * @property string $EventLogType
 * @property string $GenericFileName
 * @property integer $SystemID
 * @property integer $is_analyzed
 */


class SystemEvents extends CActiveRecord
{

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return SystemEvents the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'SystemEvents';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Facility, Priority, NTSeverity, Importance, EventCategory, EventID, MaxAvailable, CurrUsage, MinUsage, MaxUsage, InfoUnitID, SystemID, is_analyzed', 'numerical', 'integerOnly' => true),
            array('CustomerID', 'length', 'max' => 20),
            array('FromHost, EventSource, EventUser, SysLogTag, EventLogType, GenericFileName', 'length', 'max' => 60),
            array('ReceivedAt, DeviceReportedTime, Message, EventBinaryData', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('ID, CustomerID, ReceivedAt, DeviceReportedTime, Facility, Priority, FromHost, Message, NTSeverity, Importance, EventSource, EventUser, EventCategory, EventID, EventBinaryData, MaxAvailable, CurrUsage, MinUsage, MaxUsage, InfoUnitID, SysLogTag, EventLogType, GenericFileName, SystemID', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {

        return array(
            // 'nginx'=>array(self::HAS_ONE, 'NginxEvent', 'system_event_id'),
            //'php_fpm'=>array(self::HAS_ONE, 'PhpFpmEvent', 'system_event_id'),
            'event_report' => array(self::BELONGS_TO, 'EventReport', 'event_report_id'),
            'advanced_event' => array(self::HAS_ONE, 'AdvancedSystemEvent', 'system_event_id'),
        );
    }


    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'ID' => 'ID',
            'CustomerID' => 'Customer',
            'ReceivedAt' => 'Received At',
            'DeviceReportedTime' => 'Device Reported Time',
            'Facility' => 'Facility',
            'Priority' => 'Priority',
            'FromHost' => 'From Host',
            'Message' => 'Message',
            'NTSeverity' => 'Ntseverity',
            'Importance' => 'Importance',
            'EventSource' => 'Event Source',
            'EventUser' => 'Event User',
            'EventCategory' => 'Event Category',
            'EventID' => 'Event',
            'EventBinaryData' => 'Event Binary Data',
            'MaxAvailable' => 'Max Available',
            'CurrUsage' => 'Curr Usage',
            'MinUsage' => 'Min Usage',
            'MaxUsage' => 'Max Usage',
            'InfoUnitID' => 'Info Unit',
            'SysLogTag' => 'Sys Log Tag',
            'EventLogType' => 'Event Log Type',
            'GenericFileName' => 'Generic File Name',
            'SystemID' => 'System',
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

        $criteria = new CDbCriteria;

        $criteria->compare('ID', $this->ID, true);
        $criteria->compare('CustomerID', $this->CustomerID, true);
        $criteria->compare('ReceivedAt', $this->ReceivedAt, true);
        $criteria->compare('DeviceReportedTime', $this->DeviceReportedTime, true);
        $criteria->compare('Facility', $this->Facility);
        $criteria->compare('Priority', $this->Priority);
        $criteria->compare('FromHost', $this->FromHost, true);
        $criteria->compare('Message', $this->Message, true);
        $criteria->compare('NTSeverity', $this->NTSeverity);
        $criteria->compare('Importance', $this->Importance);
        $criteria->compare('EventSource', $this->EventSource, true);
        $criteria->compare('EventUser', $this->EventUser, true);
        $criteria->compare('EventCategory', $this->EventCategory);
        $criteria->compare('EventID', $this->EventID);
        $criteria->compare('EventBinaryData', $this->EventBinaryData, true);
        $criteria->compare('MaxAvailable', $this->MaxAvailable);
        $criteria->compare('CurrUsage', $this->CurrUsage);
        $criteria->compare('MinUsage', $this->MinUsage);
        $criteria->compare('MaxUsage', $this->MaxUsage);
        $criteria->compare('InfoUnitID', $this->InfoUnitID);
        $criteria->compare('SysLogTag', $this->SysLogTag, true);
        $criteria->compare('EventLogType', $this->EventLogType, true);
        $criteria->compare('GenericFileName', $this->GenericFileName, true);
        $criteria->compare('SystemID', $this->SystemID);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function getShortMessage()
    {


        if (in_array('phpexception', $this->getTags())) {
            preg_match('/^(?<pool>.*): (?<error_level>.+): (?<message>.+) in (?<file>.+)$/', $this->Message, $out);


            if (isset($out['message']))
                return $out['message'];
        }

    }


    public function getTags()
    {
        $tags = trim($this->SysLogTag, ':');
        $tagsArray = explode(':', $tags);
        $tagsArray = array_map(
            function($tag)
            {
                return preg_replace('/\[.+\]/', '', $tag);
            }
            , $tagsArray);


        return $tagsArray;
    }

    public function getMainTag()
    {
        $tags = $this->getTags();
        if (count($tags) == 1)
            return $tags[0];

        return null;
    }


    public function notAnalyzed()
    {
        $this->getDbCriteria()->mergeWith(array(
            'condition' => 'is_analyzed=0'
        ));
        return $this;
    }


    public function analyze()
    {
        $advancedEvent = $this->getRelated('advanced_event');

        if (!$advancedEvent) {
            $class = AdvancedSystemEvent::getClassNameByType($this->getMainTag());
            $advancedEvent = new $class;
        }

        if ($advancedEvent) {
            $this->initAdvancedSystemEvent($advancedEvent);

        }

        $advancedEvent->save();

        //  $this->is_analyzed=1;

    }


    protected function initAdvancedSystemEvent(AdvancedSystemEvent $advancedEvent)
    {
        $advancedEvent->system_event_id = $this->ID;
        $advancedEvent->type = $this->getMainTag();
        $advancedEvent->parseSystemEventMessage($this->Message);
        $advancedEvent->hash();
    }


}