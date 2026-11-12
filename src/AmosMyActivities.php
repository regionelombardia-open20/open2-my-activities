<?php

/**
 * Aria S.p.A.
 * OPEN 2.0
 *
 * @package   open20\amos\myactivities
 * @author    Aria S.p.A. <protocollo@pec.ariaspa.it>
 * @license   GNU General Public License v3.0 <https://www.gnu.org/licenses/gpl-3.0.html>
 * @link      https://www.ariaspa.it/
 *
 * This file is part of OPEN 2.0.
 *
 * OPEN 2.0 is free software: you can redistribute it and/or modify it
 * under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * OPEN 2.0 is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with OPEN 2.0. If not, see <https://www.gnu.org/licenses/>.
 */

namespace open20\amos\myactivities;

use open20\amos\core\module\AmosModule;
use open20\amos\myactivities\widgets\icons\WidgetIconMyActivities;

/**
 * Class AmosMyActivities
 * @package open20\amos\myactivities
 */
class AmosMyActivities extends AmosModule
{
    public $controllerNamespace = 'open20\amos\myactivities\controllers';
    public $name = 'MYACTIVITIES';
    
    public $orderType = SORT_DESC;
    
    public $documentPath = true;


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
        \Yii::setAlias('@open20/amos/' . static::getModuleName() . '/controllers', __DIR__ . '/controllers/');
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
            'MyActivities' => __NAMESPACE__ . '\\' . 'models\MyActivities',
            'MyActivitiesModelSearch' => __NAMESPACE__ . '\\' . 'models\search\MyActivitiesModelSearch',
        ];
    }
}
