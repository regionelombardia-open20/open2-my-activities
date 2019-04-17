<?php

/**
 * Lombardia Informatica S.p.A.
 * OPEN 2.0
 *
 *
 * @package    lispa\amos\myactivities\views\my-activities
 * @category   CategoryName
 */

use lispa\amos\core\views\DataProviderView;
use lispa\amos\myactivities\AmosMyActivities;
use lispa\amos\myactivities\assets\ModuleMyActivitiesAsset;

ModuleMyActivitiesAsset::register($this);

/**
 * @var yii\web\View $this
 * @var yii\web\View $currentView
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var \lispa\amos\myactivities\models\search\MyActivitiesModelSearch $model
 * @var array $parametro
 */

$this->title = "";
$this->params['breadcrumbs'][] = ['label' => AmosMyActivities::t('amosmyactivities', 'My activities'), 'url' => ['/my-activities']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="my-activities-index">
    <?= $this->render('_search', ['modelSearch' => $model]); ?>
    <?= $this->render('_order', ['modelSort' => $model]); ?>
    <?= DataProviderView::widget([
        'dataProvider' => $dataProvider,
        'currentView' => $currentView,
        'listView' => [
            'itemView' => '_switch_item',
        ],
    ]); ?>
</div>
