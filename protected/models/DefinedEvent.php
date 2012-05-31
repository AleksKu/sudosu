<?php
/**
 * @property string $message
 *
 * The followings are the available model relations:
 * @property SystemEvents $systemEvent
 * @property SystemEvents $system_event_id
 */
class DefinedEvent extends CActiveRecord
{

    const TYPE = 'system';

    protected $regexp = '/^(.*)$/';




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




    public function beforeValidate()
    {

            $this->system_event_id=$this->systemEvent->ID;
           return parent::beforeValidate();

    }


    public function afterSave()
    {
        parent::afterSave();

        $this->systemEvent->type = $this::TYPE;
        $this->systemEvent->hash = $this->calcHash();
    }

    public function calcHash()
    {
      return md5($this->message);
    }

    public function parseMessage()
    {
        $this->message = $this->systemEvent->Message;
    }







}
