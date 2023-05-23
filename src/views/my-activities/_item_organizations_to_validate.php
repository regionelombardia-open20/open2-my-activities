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

/** @var $model \open20\amos\myactivities\basic\OrganizationsToValidate */

?>
<div class="wrap-activity">
    <div class="col-md-1 col-xs-2 icon-plugin">
        <?= AmosIcons::show('building', [], 'dash') ?>
    </div>
    <?= UserRequestValidation::widget([
        'model' => $model,
        'labelKey' => AmosMyActivities::t('amosmyactivities', 'Validation organizations'),
    ]) ?>

    <div class="col-md-3 col-xs-12 wrap-action">
    <?php
        if ($model->status == $model::ORGANIZATIONS_WORKFLOW_STATUS_TO_VALIDATE) {
            echo Html::a(
                AmosIcons::show('check')
                    . ' '
                    . AmosMyActivities::t('amosmyactivities', 'Take charge'),
                Yii::$app->urlManager->createUrl([
                    '/organizations/organizations/in-validation-organization',
                    'id' => $model->id,
                    'uid' => $user_id
                ]),
                ['class' => 'btn btn-secondary']
            );
        } else {
            echo Html::a(
                AmosIcons::show('check')
                    . ' '
                    . AmosMyActivities::t('amosmyactivities', 'Validate'),
                Yii::$app->urlManager->createUrl([
                    '/organizations/organizations/validate-organization',
                    'id' => $model->id,
                    'uid' => $user_id
                ]),
                ['class' => 'btn btn-primary']
            );

            echo Html::a(
                AmosIcons::show('close')
                    . ' '
                    . AmosMyActivities::t('amosmyactivities', 'Reject'),
                Yii::$app->urlManager->createUrl([
                    '/organizations/organizations/reject-organization',
                    'id' => $model->id,
                    'uid' => $user_id
                ]),
                ['class' => 'btn btn-secondary']
            );
        }
        ?>
    </div>
</div>
<hr />
