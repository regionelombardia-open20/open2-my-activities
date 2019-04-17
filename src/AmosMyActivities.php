<?php

/**
 * Lombardia Informatica S.p.A.
 * OPEN 2.0
 *
 *
 * @package    lispa\amos\myactivities
 * @category   CategoryName
 */

namespace lispa\amos\myactivities;

use lispa\amos\core\module\AmosModule;
use lispa\amos\myactivities\widgets\icons\WidgetIconMyActivities;

/**
 * Class AmosMyActivities
 * @package lispa\amos\myactivities
 */
class AmosMyActivities extends AmosModule
{
    public $controllerNamespace = 'lispa\amos\myactivities\controllers';
    public $name = 'MYACTIVITIES';

    /**
     * @inheritdoc
     */
    public static function getModuleName()
    {
        return 'myactivities';
    }

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        \Yii::setAlias('@lispa/amos/' . static::getModuleName() . '/controllers', __DIR__ . '/controllers/');
        \Yii::configure($this, require(__DIR__ . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'config.php'));
    }

    /**
     * @inheritdoc
     */
    public function getWidgetGraphics()
    {

    }

    /**
     * @inheritdoc
     */
    public function getWidgetIcons()
    {
        return [
            WidgetIconMyActivities::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    protected function getDefaultModels()
    {
        return [
        ];
    }
}
