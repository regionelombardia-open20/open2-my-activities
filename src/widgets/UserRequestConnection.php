<?php

/**
 * Aria S.p.A.
 * OPEN 2.0
 *
 * @package   open20\amos\myactivities\widgets
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

namespace open20\amos\myactivities\widgets;

use open20\amos\admin\models\UserProfile;
use open20\amos\core\exceptions\AmosException;
use open20\amos\core\interfaces\WorkflowModelInterface;
use open20\amos\core\record\Record;
use open20\amos\myactivities\AmosMyActivities;
use open20\amos\myactivities\basic\MyActivitiesModelsInterface;
use open20\amos\workflow\behaviors\WorkflowLogFunctionsBehavior;
use yii\base\Widget;

/**
 * Class UserRequestConnection
 * @package open20\amos\myactivities\widgets
 */
class UserRequestConnection extends Widget
{
    /**
     * @var Record|MyActivitiesModelsInterface $model
     */
    public $model;

    /**
     * @var string $labelKey - label for activity title translation
     */
    public $labelKey;

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        if (!($this->model instanceof MyActivitiesModelsInterface)) {
            throw new AmosException(AmosMyActivities::t('amosmyactivities', 'UserRequestValidation: object not instance of MyActivitiesModelsInterface'));
        }
    }

    /**
     * @inheritdoc
     */
    public function run()
    {
        /** @var WorkflowLogFunctionsBehavior|WorkflowModelInterface $model */
        $model = $this->model;
            $userId = $model->user_id;

            $userProfile = UserProfile::find()->andWhere(['user_id' => $userId])->one();
            if (!is_null($userProfile)) {
                return $this->render('user_request_connection', [
                    'userProfile' => $userProfile,
                    'model' => $this->model,
                    'requestTime' => $model->created_at,
                    'project' => $model->showcaseProject->title,
                    'labelKey' => $this->labelKey,

                ]);
            }
        else
        return '';
    }
}
