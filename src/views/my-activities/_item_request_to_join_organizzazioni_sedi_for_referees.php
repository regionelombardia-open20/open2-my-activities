<?php

/**
 * Lombardia Informatica S.p.A.
 * OPEN 2.0
 *
 *
 * @package    lispa\amos\myactivities\views\my-activities
 * @category   CategoryName
 */

use lispa\amos\admin\AmosAdmin;
use lispa\amos\admin\widgets\UserCardWidget;
use lispa\amos\core\helpers\Html;
use lispa\amos\core\icons\AmosIcons;
use lispa\amos\myactivities\AmosMyActivities;

/**
 * @var \lispa\amos\myactivities\basic\RequestToJoinOrganizzazioniSediForReferees $model
 */

$userProfile = (!is_null($model->user) ? $model->user->userProfile : null);
?>
<?php if (Yii::$app->user->can('CONFIRM_ORGANIZZAZIONI_OR_SEDI_USER_REQUEST', ['model' => $model]) && !empty($userProfile)): ?>
    <?php
    $nomeCognome = $userProfile->getNomeCognome();
    $linkText = AmosIcons::show('search', [], 'dash') . ' ' . AmosMyActivities::t('amosmyactivities', 'View profile');
    ?>
    <div class="wrap-activity">
        <div class="col-md-1 col-xs-2 icon-plugin">
            <?= AmosIcons::show('users', [], 'dash') ?>
        </div>
        <div class="col-md-3 col-xs-5 wrap-user">
            <?= UserCardWidget::widget(['model' => $userProfile]) ?>
            <span class="user"><?= $nomeCognome ?></span>
            <br>
            <?= AmosAdmin::t('amosadmin', $userProfile->workflowStatus->label) ?>
        </div>
        <div class="col-md-5 col-xs-5 wrap-report">
            <div class="col-lg-12 col-xs-12">
                <strong><?= AmosMyActivities::t('amosmyactivities', 'Request for headquarter membership'); ?></strong>
            </div>
            <div class="col-lg-12 col-xs-12">
                <?= Yii::$app->formatter->asDatetime($model->getUpdatedAt()) ?>
            </div>
            <div class="col-lg-12 col-xs-12">
                <p class="user-report"><?= $nomeCognome ?></p>
                <?= AmosMyActivities::t('amosmyactivities', 'asks you to be accepted as a headquarter member of the headquarter:'); ?>
                <?= $model->profiloSedi->name; ?>
            </div>
            <div class="col-lg-12 col-xs-12">
                <?= Html::a($linkText, $userProfile->getFullViewUrl()) ?>
            </div>
        </div>
        <div class="col-md-3 col-xs-12 wrap-action">
            <?= Html::a(AmosIcons::show('check') . ' ' . AmosMyActivities::t('amosmyactivities', 'Validate'),
                Yii::$app->urlManager->createUrl([
                    '/organizzazioni/profilo-sedi/accept-user',
                    'profiloSediId' => $model->profilo_sedi_id,
                    'userId' => $model->user_id
                ]),
                ['class' => 'btn btn-primary']
            ) ?>
            <?= Html::a(AmosIcons::show('close') . ' ' . AmosMyActivities::t('amosmyactivities', 'Reject'),
                Yii::$app->urlManager->createUrl([
                    '/organizzazioni/profilo-sedi/reject-user',
                    'profiloSediId' => $model->profilo_sedi_id,
                    'userId' => $model->user_id
                ]),
                ['class' => 'btn btn-secondary']
            ) ?>
        </div>
    </div>
    <hr>
<?php endif; ?>
