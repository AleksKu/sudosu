<?php
/**
 * Created by JetBrains PhpStorm.
 * User: pirrat
 * Date: 31.05.12
 * Time: 12:11
 * To change this template use File | Settings | File Templates.
 */
class PhpFpmEventParser extends AbstractSystemEventParser
{

    public $regexp = '/^(?<pool>.*): (?<level>.+): (?<message>.+) in (?<file>.+)$/';



    public function parse($message)
    {

        preg_match($this->regexp, $message, $out);


        $this->data['message'] = isset($out['message']) ? $out['message'] : null;
        $this->data['file'] = isset($out['file']) ? $out['file'] : null;
        $this->data['level'] = isset($out['level']) ? $out['level'] : null;




    }


    public function hash()
    {
        return md5($this->data['message'].$this->data['file']);
    }
}
