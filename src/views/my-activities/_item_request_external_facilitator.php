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
use open20\amos\admin\models\UserProfile;
use open20\amos\admin\widgets\UserCardWidget;
use open20\amos\core\helpers\Html;
use open20\amos\core\icons\AmosIcons;
use open20\amos\myactivities\AmosMyActivities;

/** @var $model \open20\amos\myactivities\basic\RequestToParticipateCommunityForManager */
$userProfile = UserProfile::find()->andWhere(['id' => $model->user_profile_id])->one();
?>
<?php if (!empty($userProfile)): ?>
    <div class="wrap-activity">
        <div class="col-md-1 col-xs-2 icon-plugin">
            <?= AmosIcons::show('users', [], 'dash') ?>
        </div>
        <div class="col-md-3 col-xs-5 wrap-user">
            <?= UserCardWidget::widget(['model' => $userProfile]) ?>
            <span class="user"><?= $userProfile->getNomeCognome() ?></span>
            <br>
            <?= AmosAdmin::t('amosadmin', $userProfile->workflowStatus->label) ?>
        </div>
        <div class="col-md-5 col-xs-5 wrap-report">
            <div class="col-lg-12 col-xs-12">
                <strong><?= AmosMyActivities::t('amosmyactivities', "Richiesta facilitatore esterno"); ?></strong>
            </div>
            <div class="col-lg-12 col-xs-12">
                <?= Yii::$app->formatter->asDatetime($model->getUpdatedAt()) ?>
            </div>
            <div class="col-lg-12 col-xs-12">
                <p class="user-report"><?= $userProfile->getNomeCognome() ?></p>
                <?= AmosMyActivities::t('amosmyactivities', "Chiede che tu sia il suo facilitatore esterno"); ?>
            </div>
            <div class="col-lg-12 col-xs-12">
                <?= Html::a(AmosIcons::show('search', [], 'dash') . ' ' . AmosMyActivities::t('amosmyactivities',
                        'View card'),
                    Yii::$app->urlManager->createUrl([
                        '/'. AmosAdmin::getModuleName() . '/user-profile/view',
                        'id' => $model->user_profile_id,
                        'uid' => $user_id
                    ])
                ) ?>
            </div>
        </div>

        <div class="col-md-3 col-xs-12 wrap-action">
        <?= Html::a(
            AmosIcons::show('check')
            . AmosMyActivities::t('amosmyactivities', 'Accept'),
            [
                '/'
                . AmosAdmin::getModuleName()
                . '/user-profile/accept-request',
                'id' => $model->id,
                'fromMyactivities' => true,
                'uid' => $user_id
            ],
            ['class' => 'btn btn-navigation-primary']
        )
        ?>

        <?= Html::a(
            AmosIcons::show('close')
            . AmosMyActivities::t('amosmyactivities', 'Reject'),
            [
                '/'
                . AmosAdmin::getModuleName()
                . '/user-profile/reject-request',
                'id' => $model->id,
                'fromMyactivities' => true,
                'uid' => $user_id
            ],
            ['class' => 'btn btn-navigation-secondary']
        )
        ?>
        </div>
    </div>
    <hr />
<?php endif; ?>
