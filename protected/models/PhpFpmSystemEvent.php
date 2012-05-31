<?php
/**
 * Created by JetBrains PhpStorm.
 * User: pirrat
 * Date: 31.05.12
 * Time: 12:11
 * To change this template use File | Settings | File Templates.
 */
class PhpFpmSystemEvent extends AdvancedSystemEvent
{

    const EVENT_TYPE = 'php-fpm';
    public $regexp = '/^(?<pool>.*): (?<level>.+): (?<message>.+) in (?<file>.+)$/U';


    static function model($className=__CLASS__) {
        return parent::model($className);
    }

    function defaultScope(){
        return array(
            'condition'=>"type='".self::EVENT_TYPE."'",
        );
    }


    public function parseSystemEventMessage($message)
    {

        preg_match($this->regexp, $message, $out);


        $this->message = isset($out['message']) ? $out['message'] : null;
        $this->file = isset($out['file']) ? $out['file'] : null;
        $this->level = isset($out['level']) ? $out['level'] : null;




    }


    public function hash()
    {
        $this->hash = md5($this->message.$this->file);
    }
}
