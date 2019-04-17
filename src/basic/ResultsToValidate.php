<?php

/**
 * Lombardia Informatica S.p.A.
 * OPEN 2.0
 *
 *
 * @package    lispa\amos\myactivities\basic
 * @category   CategoryName
 */

namespace lispa\amos\myactivities\basic;

use amos\results\models\Result;
use amos\results\models\search\ResultSearch;
use lispa\amos\admin\models\UserProfile;

/**
 * Class ResultsToValidate
 * @package lispa\amos\myactivities\basic
 */
class ResultsToValidate extends ResultSearch implements MyActivitiesModelsInterface
{
    /**
     * @return string
     */
    public function getSearchString()
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @return string
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * @return string
     * @throws \yii\base\InvalidConfigException
     */
    public function getCreatorNameSurname()
    {
        /** @var UserProfile $userProfile */
        $userProfile = UserProfile::find()->andWhere(['user_id' => $this->created_by])->one();
        if (!empty($userProfile)) {
            return $userProfile->getNomeCognome();
        }
        return '';
    }

    /**
     * @return Result
     */
    public function getWrappedObject()
    {
        return Result::findOne($this->id);
    }
}
