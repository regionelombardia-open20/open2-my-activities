<?php

/**
 * Aria S.p.A.
 * OPEN 2.0
 *
 *
 * @package    open20\amos\myactivities\views\my-activities
 * @category   CategoryName
 */

/** @var $model \open20\amos\myactivities\basic\ExpressionOfInterestToEvaluate */

use open20\amos\core\helpers\Html;
use open20\amos\core\icons\AmosIcons;
use open20\amos\myactivities\AmosMyActivities;
use open20\amos\myactivities\widgets\UserRequestValidation;

/** @var $model \open20\amos\myactivities\basic\CommunityToValidate */

?>
<div class="wrap-activity">
    <div class="col-md-1 col-xs-2 icon-plugin">
        <?= AmosIcons::show('group', [], 'dash') ?>
    </div>
    <?= UserRequestValidation::widget([
        'model' => $model,
        'labelKey' => AmosMyActivities::t('amosmyactivities', '#expressionofinterestvalidation'),
    ]) ?>

    <div class="col-md-3 col-xs-12 wrap-action">
    <?= Html::a(
        AmosIcons::show('check')
            . ' '
            . AmosMyActivities::t('amosmyactivities', 'Validate'),
        Yii::$app->urlManager->createUrl([
            '/partnershipprofiles/expressions-of-interest/validate',
            'id' => $model->id,
            'uid' => $user_id
        ]),
        ['class' => 'btn btn-primary']
    )
    ?>

    <?= Html::a(
        AmosIcons::show('close')
            . ' '
            . AmosMyActivities::t('amosmyactivities', 'Reject'),
        Yii::$app->urlManager->createUrl([
            '/partnershipprofiles/expressions-of-interest/reject',
            'id' => $model->id,
            'uid' => $user_id
        ]),
        ['class' => 'btn btn-secondary']
    )
    ?>
    </div>
</div>
<hr />
