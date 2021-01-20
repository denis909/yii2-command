<?php

namespace denis909\yii;

use Psr\Log\LoggerTrait;
use Psr\Log\LoggerAwareTrait;
use Psr\Log\NullLogger;
use denis909\yii\ConsoleLogger;

class Command extends \yii\console\Controller
{

    use LoggerAwareTrait;

    use LoggerTrait;

    public $debug;

    public function options($actionID)
    {
        return ['debug'];
    }

    public function init()
    {
        parent::init();

        if ($this->debug)
        {
            $this->setLogger(new ConsoleLogger);
        }
        else
        {
            $this->setLogger(new NullLogger);
        }
    }

    public function log($level, $message, array $context = [])
    {
        $this->logger->log($level, $message, $context);
    }

}