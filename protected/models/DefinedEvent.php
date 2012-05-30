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


    /**
     * We're overriding this method to fill findAll() and similar method result
     * with proper models.
     *
     * @param array $attributes
     * @return DefinedEvent
     */
    protected function instantiate($attributes){
        switch($attributes['type']){
            case 'sport':
                $class='SportCar';
                break;
            case 'family':
                $class='FamilyCar';
                break;
            default:
                $class=get_class($this);
        }
        $model=new $class(null);
        return $model;
    }




}
