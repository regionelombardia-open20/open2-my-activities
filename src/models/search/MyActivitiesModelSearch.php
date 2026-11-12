<?php

/**
 * Aria S.p.A.
 * OPEN 2.0
 *
 * @package   open20\amos\myactivities\models\search
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

namespace open20\amos\myactivities\models\search;

use open20\amos\myactivities\AmosMyActivities;
use open20\amos\myactivities\basic\MyActivitiesModelsInterface;
use yii\base\Model;

/**
 * Class MyActivitiesModelSearch
 * @package open20\amos\myactivities\models\search
 */
class MyActivitiesModelSearch extends Model implements MyActivitiesModelsInterface
{
    public $createdAt;
    public $updatedAt;
    public $creatorNameSurname;
    public $searchString;
    public $orderType;
    public $wrappedObject;

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @return mixed
     */
    public function getCreatorNameSurname()
    {
        return $this->creatorNameSurname;
    }

    /**
     * @return mixed
     */
    public function getSearchString()
    {
        return $this->searchString;
    }

    public function getWrappedObject()
    {
        return $this->wrappedObject;
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['searchString'], 'safe'],
            [['orderType'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'searchString' => AmosMyActivities::t('amosmyactivities', 'Text search'),
            'orderType' => AmosMyActivities::t('amosmyactivities', 'Update date sort'),
        ];
    }
}
