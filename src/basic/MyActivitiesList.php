<?php

/**
 * Aria S.p.A.
 * OPEN 2.0
 *
 * @package   open20\amos\myactivities\basic
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

namespace open20\amos\myactivities\basic;

use open20\amos\myactivities\models\search\MyActivitiesModelSearch;
use yii\helpers\ArrayHelper;

/**
 * Class MyActivitiesList
 * @package open20\amos\myactivities\basic
 */
class MyActivitiesList implements MyActivitiesListInterface
{
    /** @var array $myActivitiesList */
    private $myActivitiesList;

    /**
     * @return array
     */
    public function getMyActivitiesList()
    {
        return $this->myActivitiesList;
    }

    /**
     * @param array $myActivitiesList
     */
    public function setMyActivitiesList($myActivitiesList)
    {
        $this->myActivitiesList = $myActivitiesList;
    }

    /**
     * @param array $listModel
     */
    public function addModelSet($listModel)
    {
        if (!is_null($this->myActivitiesList)) {
            $this->myActivitiesList = ArrayHelper::merge($this->myActivitiesList, $listModel);
        } else {
            $this->myActivitiesList = array_merge($listModel);
        }
    }

    /**
     * @param MyActivitiesModelSearch $modelSearch
     */
    public function applyFilter($modelSearch)
    {
        if (!is_null($modelSearch) && !empty($modelSearch)) {
            if (!empty($this->myActivitiesList)) {
                /** @var MyActivitiesModelsInterface $activity */
                foreach ($this->myActivitiesList as $key => $activity) {
                    // filter for SearchString
                    $searchString = $activity->getSearchString();
                    $modelSearchString = $modelSearch->searchString;
                    if (!empty($searchString) && !empty($modelSearchString)) {
                        if (strpos(strtoupper($activity->getSearchString()), strtoupper($modelSearch->searchString)) === false) {
                            unset($this->myActivitiesList[$key]);
                        }
                    }
                }
            }
        }
    }

    /**
     * @param MyActivitiesModelSearch $modelSearch
     */
    public function applySort($modelSearch)
    {
        if (!is_null($modelSearch) && !empty($modelSearch)) {
            $sortType = $modelSearch->orderType;
            if (!empty($sortType)) {
                $this->sortMyActivitiesList($sortType);
                return;
            }
        }
        $myActivitiesModule = \Yii::$app->getModule('myactivities');
        $this->sortMyActivitiesList($myActivitiesModule->orderType);
    }

    /**
     * @param int $mode = SORT_DESC | SORT_ASC
     */
    public function sortMyActivitiesList(int $mode = SORT_DESC)
    {
        if (count($this->myActivitiesList) > 0) {
            if ($mode == SORT_DESC) {
                ArrayHelper::multisort(
                    $this->myActivitiesList,
                    'updatedAt',
                    SORT_DESC,
                    SORT_STRING
                );
            } else {
                ArrayHelper::multisort(
                    $this->myActivitiesList,
                    'updatedAt',
                    SORT_ASC,
                    SORT_STRING
                );
            }
        }

    }
}
