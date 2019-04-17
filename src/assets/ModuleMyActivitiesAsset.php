<?php

/**
 * Lombardia Informatica S.p.A.
 * OPEN 2.0
 *
 *
 * @package    lispa\amos\myactivities\assets
 * @category   CategoryName
 */

namespace lispa\amos\myactivities\assets;

use yii\web\AssetBundle;

/**
 * Class ModuleMyActivitiesAsset
 * @package lispa\amos\myactivities\assets
 */
class ModuleMyActivitiesAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $sourcePath = '@vendor/lispa/amos-my-activities/src/assets/web';

    /**
     * @inheritdoc
     */
    public $css = [
        'less/my-activities.less'

    ];

    /**
     * @inheritdoc
     */
    public $js = [
    ];

    /**
     * @inheritdoc
     */
    public $depends = [
    ];

    /**
     * @inheritdoc
     */
    public function init()
    {
        $moduleL = \Yii::$app->getModule('layout');
        if (!empty($moduleL)) {
            $this->depends [] = 'lispa\amos\layout\assets\BaseAsset';
        } else {
            $this->depends [] = 'lispa\amos\core\views\assets\AmosCoreAsset';
        }
        parent::init();
    }
}
