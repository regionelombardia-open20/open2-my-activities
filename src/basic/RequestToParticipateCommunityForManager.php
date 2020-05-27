<?php

/**
 * Aria S.p.A.
 * OPEN 2.0
 *
 *
 * @package    open20\amos\myactivities\basic
 * @category   CategoryName
 */

namespace open20\amos\myactivities\basic;

use open20\amos\admin\models\UserProfile;

/**
 * Class RequestToParticipateCommunityForManager
 * @see \open20\amos\community\models\Community
 * @package open20\amos\myactivities\basic
 */
class RequestToParticipateCommunityForManager extends \open20\amos\community\models\CommunityUserMm implements MyActivitiesModelsInterface
{
    /**
     * @return string
     * @throws \yii\base\InvalidConfigException
     */
    public function getSearchString()
    {
        /** @var UserProfile $userProfile */
        $userProfile = UserProfile::find()->andWhere(['user_id' => $this->user_id])->one();
        if (!empty($userProfile)) {
            return $userProfile->getNomeCognome();
        }
        return '';
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
     * @return \open20\amos\community\models\CommunityUserMm
     */
    public function getWrappedObject()
    {
        return \open20\amos\community\models\CommunityUserMm::findOne($this->id);
    }
}
