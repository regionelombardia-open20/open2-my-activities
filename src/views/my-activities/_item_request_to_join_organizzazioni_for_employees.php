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

use open20\amos\admin\AmosAdmin;
use open20\amos\admin\widgets\UserCardWidget;
use open20\amos\core\helpers\Html;
use open20\amos\core\icons\AmosIcons;
use open20\amos\myactivities\AmosMyActivities;

/**
 * @var \open20\amos\myactivities\basic\RequestToJoinOrganizzazioniForReferees $model
 */

$userProfile = $model->createdUserProfile;
$profilo = $model->profilo;

?>

<?php
/** Task 25541
 * Commentato controllo sotto perché la rule "confirmUserRequest" associata al permesso CONFIRM_ORGANIZZAZIONI_OR_SEDI_USER_REQUEST
 * attualmente restituisce true solo se è specificato un referente_operativo o un rappresentante_legale.
 * Se non è presentente nessuno dei due, viene comunque inviata la mail all'invitato e si aggiorna il counterMyActivities,
 * ma l'utente non vede la richiesta nel suo myActivities.
 */

//if (Yii::$app->user->can('CONFIRM_ORGANIZZAZIONI_OR_SEDI_USER_REQUEST', ['model' => $model]) && !empty($userProfile)): ?>
    <?php
    $nomeCognome = $userProfile->getNomeCognome();
    $linkText = AmosIcons::show('search', [], 'dash') . ' ' . AmosMyActivities::t('amosmyactivities', '#view_organization');
    ?>
    <div class="wrap-activity">
        <div class="col-md-1 col-xs-2 icon-plugin">
            <?= AmosIcons::show('building', [], 'dash') ?>
        </div>
        <div class="col-md-3 col-xs-5 wrap-user">
            <?= UserCardWidget::widget(['model' => $userProfile]) ?>
            <span class="user"><?= $nomeCognome ?></span>
            <br>
            <?php if (!AmosAdmin::instance()->bypassWorkflow): ?>
                <?= AmosAdmin::t('amosadmin', $userProfile->workflowStatus->label) ?>
            <?php endif; ?>
        </div>
        <div class="col-md-5 col-xs-5 wrap-report">
            <div class="col-lg-12 col-xs-12">
                <strong><?= AmosMyActivities::t('amosmyactivities', 'Request for organization membership'); ?></strong>
            </div>
            <div class="col-lg-12 col-xs-12">
                <?= Yii::$app->formatter->asDatetime($model->getUpdatedAt()) ?>
            </div>
            <div class="col-lg-12 col-xs-12">
                <p class="user-report"><?= $nomeCognome ?></p>
                <?= AmosMyActivities::t('amosmyactivities', 'asks you to accept the invitation to participate to the organization:'); ?>
                <?= $model->profilo->name; ?>
            </div>
            <div class="col-lg-12 col-xs-12">
                <?= Html::a($linkText, $profilo->getFullViewUrl()) ?>
            </div>
        </div>
        <div class="col-md-3 col-xs-12 wrap-action">
            <?= Html::a(AmosIcons::show('check') . ' ' . AmosMyActivities::t('amosmyactivities', 'Accept'),
                Yii::$app->urlManager->createUrl([
                    '/organizzazioni/profilo/join-organization',
                    'organizationId' => $model->profilo_id,
                    'userId' => $model->user_id,
                    'accept' => true,
                    'redirectAction' => '/myactivities/my-activities/index',
                    'uid' => $user_id
                ]),
                ['class' => 'btn btn-primary']
            ) ?>
            <?= Html::a(AmosIcons::show('close') . ' ' . AmosMyActivities::t('amosmyactivities', 'Reject'),
                Yii::$app->urlManager->createUrl([
                    '/organizzazioni/profilo/join-organization',
                    'organizationId' => $model->profilo_id,
                    'userId' => $model->user_id,
                    'accept' => false,
                    'redirectAction' => '/myactivities/my-activities/index',
                    'uid' => $user_id
                ]),
                ['class' => 'btn btn-secondary']
            ) ?>
        </div>
    </div>
    <hr />
<?php //endif; ?>
