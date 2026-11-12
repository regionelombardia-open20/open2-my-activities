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

use open20\amos\myactivities\AmosMyActivities;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var \open20\amos\myactivities\models\search\MyActivitiesModelSearch $modelSort
 * @var yii\widgets\ActiveForm $form
 */
$form = ActiveForm::begin([
    'action' => Yii::$app->controller->action->id,
    'method' => 'get',
    'options' => [
        'class' => 'default-form'
    ]
]);
?>

<div class="news-order element-to-toggle" data-toggle-element="form-order">
    <div class="col-xs-12">
        <h2><?= AmosMyActivities::t('amosmyactivities', 'Sort by') ?>:</h2>
    </div>

    <div class="col-sm-6 col-lg-4">
    <?= $form->field($modelSort, 'orderType')->dropDownList([
        SORT_DESC => AmosMyActivities::t('amosmyactivities', 'Descending'),
        SORT_ASC => AmosMyActivities::t('amosmyactivities', 'Ascending'),
    ])
    ?>
    </div>

    <div class="col-xs-12">
        <div class="pull-right">
        <?= Html::a(
            AmosMyActivities::t('amosmyactivities', 'Reset'),
            [Yii::$app->controller->action->id],
            ['class' => 'btn btn-secondary']
        )
        ?>

        <?= Html::submitButton(
            AmosMyActivities::t('amosmyactivities', 'Sort'),
            ['class' => 'btn btn-navigation-primary']
        )
        ?>
        </div>
    </div>

    <div class="clearfix"></div>
</div>
<?php ActiveForm::end(); ?>
