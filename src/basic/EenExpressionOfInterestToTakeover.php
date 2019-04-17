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

use lispa\amos\admin\models\UserProfile;
use lispa\amos\een\models\EenExprOfInterest;
use lispa\amos\een\models\search\EenExprOfInterestSearch;

/**
 * Class EenExpressionOfInterestToTakeover
 * @package lispa\amos\myactivities\basic
 */
class EenExpressionOfInterestToTakeover extends EenExprOfInterestSearch implements MyActivitiesModelsInterface
{
    /**
     * @return mixed
     */
    public function getSearchString()
    {
        return $this->getEenPartnershipProposal()->one()->content_title;
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
     * @return EenExprOfInterest
     */
    public function getWrappedObject()
    {
        return EenExprOfInterest::findOne($this->id);
    }
}
