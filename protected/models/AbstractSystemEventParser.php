<?php
/**
 * Created by JetBrains PhpStorm.
 * User: pirrat
 * Date: 31.05.12
 * Time: 12:06
 * To change this template use File | Settings | File Templates.
 */
abstract class AbstractSystemEventParser
{

    protected $data = array();

    public function parse($message)
    {
        return $this->data['message'] = $message;
    }

    public function getData()
    {
        return $this->data;
    }

    public function hash()
    {
        return md5($this->data['message']);
    }


}
