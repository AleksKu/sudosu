<?php
/**
 * Created by JetBrains PhpStorm.
 * User: pirrat
 * Date: 31.05.12
 * Time: 12:11
 * To change this template use File | Settings | File Templates.
 */
class NginxEventParser extends AbstractSystemEventParser
{

    protected $regexp = '/^(?<date>.*) \[(?<level>.+)\] (?<nubmer>.+): \*(?<nubmer2>.+) (?<message>.+), client: (?<client>.+), server: (?<server>.+), request: (?<request>.+), upstream: (?<upstream>.+), host: (?<host>.+)(, referrer: (?<referrer>.+))*$/U';


    public function parse($message)
    {

        preg_match($this->regexp, $message, $out);

        $this->data['message'] = isset($out['message']) ? $out['message'] : null;
        $this->data['client'] = isset($out['client']) ? $out['client'] : null;
        $this->data['server'] = isset($out['server']) ? $out['server'] : null;
        $this->data['request'] = isset($out['request']) ? trim($out['request'],'"') : null;
        $this->data['referrer'] = isset($out['referrer']) ? trim($out['referrer'],'"') : null;


    }


    public function hash()
    {
        return md5($this->data['message'].$this->data['server']);
    }
}
