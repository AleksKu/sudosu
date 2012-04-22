<?php
class Formatter extends CFormatter
{

    public function formatLogMessage($value)
    {
        return '<span class="logMessage">'.$value.'</span>';
    }
}