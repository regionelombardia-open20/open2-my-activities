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
use open20\amos\myactivities\widgets\UserRequestValidation;

/** @var $model \open20\amos\myactivities\basic\CommentToValidate */

$context = $model->context;
$contextModel = $context::findOne($model->context_id);
$anchor = '#comment-' . $model->id;
$customUrl = $contextModel->getFullViewUrl() . $anchor;

?>

<div class="wrap-activity">
    <div class="col-md-1 col-xs-2 icon-plugin">
        <?= AmosIcons::show('comment') ?>
    </div>
    <?= UserRequestValidation::widget([
        'model' => $model,
        'customUrl' => $customUrl,
        'labelKey' => AmosMyActivities::t('amosmyactivities', 'Validation comment'),
    ]) ?>
    <div class="col-md-3 col-xs-12 wrap-action">
        <?= Html::a(
            AmosIcons::show('check')
            . ' '
            . AmosMyActivities::t('amosmyactivities', 'Validate'),
            Yii::$app->urlManager->createUrl([
                '/comments/comment-dashboard/validate-comment',
                'id' => $model->id,
                'redirectUrl' => '/myactivities/my-activities/index',
            ]),
            [
                'class' => 'btn btn-primary',
                'title' => AmosMyActivities::t('amosmyactivities', 'Validate'),
            ]
        )
        ?>

        <?= Html::a(
            AmosIcons::show('close')
            . ' '
            . AmosMyActivities::t('amosmyactivities', 'Reject'),
            Yii::$app->urlManager->createUrl([
                '/comments/comment-dashboard/reject-comment',
                'id' => $model->id,
                'redirectUrl' => '/myactivities/my-activities/index',
            ]),
            [
                'class' => 'btn btn-secondary',
                'title' => AmosMyActivities::t('amosmyactivities', 'Reject'),
            ]
        )
        ?>
    </div>
</div>
<hr />
