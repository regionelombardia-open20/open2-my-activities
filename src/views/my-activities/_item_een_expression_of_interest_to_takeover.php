<?php

/**
 * Aria S.p.A.
 * OPEN 2.0
 *
 *
 * @package    open20\amos\myactivities\views\my-activities
 * @category   CategoryName
 */

use open20\amos\core\helpers\Html;
use open20\amos\core\icons\AmosIcons;
use open20\amos\myactivities\AmosMyActivities;
use open20\amos\myactivities\widgets\ExpressionOfInterestToTakeover;

// TODO HERE

/** @var $model \open20\amos\myactivities\basic\ResultsProposalToValidate */

?>
<div class="wrap-activity">
    <div class="col-md-1 col-xs-2 icon-plugin">
        <?= AmosIcons::show('gears', [], 'dash') ?>
    </div>
    
    <?= ExpressionOfInterestToTakeover::widget([
        'model' => $model,
        'labelKey' => $model->is_request_more_info ? AmosMyActivities::t('amosmyactivities', '#eenexpressionofinterestrequestmoreinfo') : AmosMyActivities::t('amosmyactivities', '#eenexpressionofinteresttotakeover'),
    ]) ?>
    
    <div class="col-md-3 col-xs-12 wrap-action">
    <?= Html::a(
        AmosIcons::show('check')
            . ' '
            . AmosMyActivities::t('amosmyactivities', '#takeover'),
        Yii::$app->urlManager->createUrl([
            '/een/een-expr-of-interest/take-over',
            'id' => $model->id,
            'uid' => $user_id
        ]),
        ['class' => 'btn btn-primary']
    )
    ?>
    </div>
</div>
<hr />
