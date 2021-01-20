<?php

namespace denis909\yii;

use yii\helpers\ArrayHelper;
use Psr\Log\LoggerAwareTrait;
use Psr\Log\NullLogger;
use Denis909\ConsoleLogger\ConsoleLogger;

class Command extends \yii\console\Controller
{

    use LoggerAwareTrait;

    public $silent;

    public function init()
    {
        parent::init();

        $this->setLogger(new ConsoleLogger);
    }

    public function options($actionID)
    {
        return ArrayHelper::merge(parent::options($actionID), ['silent']);
    }

    public function beforeAction($action)
    {
        if ($this->silent)
        {
            $this->setLogger(new NullLogger);
        }

        return parent::beforeAction($action);
    }

}