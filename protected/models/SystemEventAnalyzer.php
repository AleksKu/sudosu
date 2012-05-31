<?php

class SystemEventAnalyzer
{



    protected $systemEvent;

    protected $isDefined = false;
    protected $type = false;

    /**
     *  @var $parser AbstractSystemEventParser
     */
    protected $parser = null;

    /**
     * @var array
     */

    public $rules = array(
        'php-fpm'=>'PhpFpmEventParser',
        'nginx'=>'NginxEventParser',
    );

    public function __construct(SystemEvents $systemEvent)
    {
        $this->systemEvent = $systemEvent;
        $this->init();

    }

    protected function init()
    {
        $mainTag = $this->systemEvent->getMainTag();
        if(array_key_exists($mainTag,$this->rules))
        {
            $this->type = $mainTag;
            $this->isDefined = true;

            $className = $this->rules[$mainTag];
            $this->parser = new $className;
        } else {

        }
    }



    public function getType()
    {
        return $this->type;
    }

    public function isDefined()
    {
        return $this->isDefined;
    }

    public function map(AdvancedSystemEvent $advancedEvent)
    {
        $this->parser->parse($this->systemEvent->Message);
        $data = $this->parser->getData();
        $advancedEvent->setAttributes($data);
        $advancedEvent->type = $this->getType();
        $advancedEvent->hash = $this->parser->hash();
    }





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
