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
use open20\amos\news\models\News;
use yii\helpers\ArrayHelper;

/**
 * Class NewsToValidate
 * @package open20\amos\myactivities\basic
 */
class NewsToValidate extends \open20\amos\news\models\search\NewsSearch implements MyActivitiesModelsInterface
{
    /**
     * @return string
     */
    public function getSearchString()
    {
        return $this->titolo;
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
     * @return News
     */
    public function getWrappedObject()
    {
        return News::findOne($this->id);
    }

    /**
     * @inheritdoc
     */
    public function getViewUrl()
    {
        return 'news/news/view';
    }

    /**
     * Method that searches all news to be validated.
     *
     * @param array $params
     * @param int $limit
     * @return ActiveDataProvider
     */
    public function searchToValidateNews($params, $limit = null)
    {
        $dataProvider = parent::searchToValidateNews($params, null);

        // workaround (News works only for community news)...
        if (empty($ids)) {
            $validators = $this->getValidatorUsersId();
            if (in_array(\Yii::$app->user->id, $validators)) {
                $dataProvider = parent::search($params, 'to-validate', $limit, false, 20);
                $dataProvider->query
                    ->andWhere([self::tableName() . '.status' => self::NEWS_WORKFLOW_STATUS_DAVALIDARE]);
            }

        }

        $dataProvider->pagination = false;
        return $dataProvider;
    }
}
