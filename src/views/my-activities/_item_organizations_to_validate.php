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
