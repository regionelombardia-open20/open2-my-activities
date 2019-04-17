<?php

/**
 * Lombardia Informatica S.p.A.
 * OPEN 2.0
 *
 *
 * @package    lispa\amos\myactivities\views\my-activities
 * @category   CategoryName
 */

use lispa\amos\core\helpers\Html;
use lispa\amos\core\icons\AmosIcons;
use lispa\amos\myactivities\AmosMyActivities;

// TODO HERE

/** @var $model \lispa\amos\myactivities\basic\ResultsProposalToValidate */

?>
<div class="wrap-activity">
    <div class="col-md-1 col-xs-2 icon-plugin">
        <?= AmosIcons::show('gears', [], 'dash') ?>
    </div>
    <?= \lispa\amos\myactivities\widgets\ExpressionOfInterestToTakeover::widget([
        'model' => $model,
        'labelKey' => $model->is_request_more_info ? AmosMyActivities::t('amosmyactivities', '#eenexpressionofinterestrequestmoreinfo') : AmosMyActivities::t('amosmyactivities', '#eenexpressionofinteresttotakeover'),
    ]) ?>
    <div class="col-md-3 col-xs-12 wrap-action">
        <?php
        echo Html::a(AmosIcons::show('check') . ' ' . AmosMyActivities::t('amosmyactivities', '#takeover'),
            Yii::$app->urlManager->createUrl([
                '/een/een-expr-of-interest/take-over',
                'id' => $model->id,
            ]),
            ['class' => 'btn btn-primary']
        )
        ?>
    </div>
</div>
<hr>
