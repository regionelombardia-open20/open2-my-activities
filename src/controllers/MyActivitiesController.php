<?php

/**
 * Lombardia Informatica S.p.A.
 * OPEN 2.0
 *
 *
 * @package    lispa\amos\myactivities\controllers
 * @category   CategoryName
 */

namespace lispa\amos\myactivities\controllers;

use lispa\amos\core\controllers\CrudController;
use lispa\amos\core\helpers\Html;
use lispa\amos\core\icons\AmosIcons;
use lispa\amos\myactivities\AmosMyActivities;
use lispa\amos\myactivities\models\MyActivities;
use lispa\amos\myactivities\models\search\MyActivitiesModelSearch;
use yii\data\ArrayDataProvider;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

/**
 * Class MyActivitiesController
 * MyActivitiesController implements the CRUD actions
 *
 * @property \lispa\amos\myactivities\models\MyActivities $model
 * @property \lispa\amos\myactivities\models\MyActivities $modelSearch
 *
 * @package lispa\amos\myactivities\controllers
 */
class MyActivitiesController extends CrudController
{
    /**
     * @var string $layout
     */
    public $layout = 'list';

    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->setModelObj(new MyActivities());
        $this->setModelSearch(new MyActivities());

        $this->setAvailableViews([
            'list' => [
                'name' => 'list',
                'label' => AmosIcons::show('view-list') . Html::tag('p', AmosMyActivities::t('amoscore', 'List')),
                'url' => '?currentView=list'
            ],
        ]);

        parent::init();
        $this->setUpLayout();
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return ArrayHelper::merge(parent::behaviors(), [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => [
                            'index',
                        ],
                        'roles' => ['ADMIN', 'VALIDATED_BASIC_USER']
                    ],
                ]
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post', 'get']
                ]
            ]
        ]);
    }

    /**
     * @param string|null $layout
     * @return string
     */
    public function actionIndex($layout = NULL)
    {
        $moduleCwh = \Yii::$app->getModule('cwh');
        if (isset($moduleCwh)) {
            /** @var \lispa\amos\cwh\AmosCwh $moduleCwh */
            $moduleCwh->resetCwhScopeInSession();
        }
        Url::remember();
        $this->setUpLayout('list');

        $modelSearch = new MyActivitiesModelSearch;
        $modelSearch->load(\Yii::$app->request->getQueryParams());

        $model = new MyActivities();
        $listOfActivities = $model->getMyActivities($modelSearch);
        $dataProvider = new ArrayDataProvider();
        if (count($listOfActivities) > 0) {
            $dataProvider->setModels($listOfActivities);
            $this->parametro['empty'] = false;
        } else {
            $dataProvider->setModels([]);
            $this->parametro['empty'] = true;
        }
        $this->dataProvider = $dataProvider;

        $this->setModelSearch($modelSearch);
        return parent::actionIndex();
    }
}
