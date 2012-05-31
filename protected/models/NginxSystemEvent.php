<?php
/**
 * Created by JetBrains PhpStorm.
 * User: pirrat
 * Date: 31.05.12
 * Time: 12:11
 * To change this template use File | Settings | File Templates.
 */
class NginxSystemEvent extends AdvancedSystemEvent
{

    const EVENT_TYPE = 'nginx';

    protected $regexp = '/^(?<date>.*) \[(?<level>.+)\] (?<nubmer>.+): \*(?<nubmer2>.+) (?<message>.+), client: (?<client>.+), server: (?<server>.+), request: (?<request>.+), upstream: (?<upstream>.+), host: (?<host>.+)(, referrer: (?<referrer>.+))*$/U';

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
        $this->client = isset($out['client']) ? $out['client'] : null;
        $this->server = isset($out['server']) ? $out['server'] : null;
        $this->request = isset($out['request']) ? trim($out['request'],'"') : null;
        $this->referrer = isset($out['referrer']) ? trim($out['referrer'],'"') : null;


    }


    public function hash()
    {
        $this->hash = md5($this->message.$this->server);

    }
}
