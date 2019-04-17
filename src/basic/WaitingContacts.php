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

use lispa\amos\admin\models\UserContact;
use lispa\amos\admin\models\UserProfile;

/**
 * Class WaitingContacts
 * @package lispa\amos\myactivities\basic
 */
class WaitingContacts extends UserContact implements MyActivitiesModelsInterface
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

    public function getWrappedObject()
    {
        return UserContact::findOne($this->id);
    }
}
