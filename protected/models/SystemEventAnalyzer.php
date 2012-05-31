<?php

class SystemEventAnalyzer
{


    public static function collect()
    {

        //@todo обернуть в транзакцию

        $events = SystemEvents::model()->notAnalyzed()->findAll();
        /* @var $event SystemEvents */

        foreach($events as $event)
        {

            $event->analyze();
            $event->save();

        }
    }

}
