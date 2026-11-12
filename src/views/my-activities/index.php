<?php

/**
 * Aria S.p.A.
 * OPEN 2.0
 *
 * @package   open20\amos\myactivities\views\my-activities
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

use open20\amos\core\views\DataProviderView;
use open20\amos\myactivities\assets\ModuleMyActivitiesAsset;

ModuleMyActivitiesAsset::register($this);

/**
 * @var yii\web\View $this
 * @var yii\web\View $currentView
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var \open20\amos\myactivities\models\search\MyActivitiesModelSearch $model
 * @var array $parametro
 */

//$this->title = AmosMyActivities::t('amosmyactivities', 'My activities');
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="my-activities-index">
    <?= $this->render('_search', ['modelSearch' => $model]); ?>
    <?= $this->render('_order', ['modelSort' => $model]); ?>
    <?= DataProviderView::widget([
        'dataProvider' => $dataProvider,
        'currentView' => $currentView,
        'showPageSummary' => false,
        'listView' => [
            'itemView' => '_switch_item',
        ],
    ]); ?>
</div>
