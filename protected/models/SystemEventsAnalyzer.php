<?php
/**
 * Created by JetBrains PhpStorm.
 * User: pirrat
 * Date: 26.05.12
 * Time: 16:16
 * To change this template use File | Settings | File Templates.
 */
class SystemEventsAnalyzer
{


    public function collect()
    {

        //@todo обернуть в транзакцию

        $events = SystemEvents::model()->notAnalyzed()->findAll();
        /* @var $event SystemEvents */

        foreach($events as $event)
        {
            $event->getType();
            if($event->isDefined())
            {
                $relatedEvent = $event->getRelatedEvent();

                $relatedEvent->parseMessage();
                if($relatedEvent->save())
                {

                }

            }


            $event->is_analyzed=1;
            $event->save();
        }
    }

}
