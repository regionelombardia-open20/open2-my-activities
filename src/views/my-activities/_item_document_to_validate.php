<?php

/**
 * Aria S.p.A.
 * OPEN 2.0
 *
 *
 * @package    open20\amos\myactivities\views\my-activities
 * @category   CategoryName
 */

use open20\amos\core\helpers\Html;
use open20\amos\admin\AmosAdmin;
use open20\amos\core\icons\AmosIcons;
use open20\amos\myactivities\AmosMyActivities;
use open20\amos\cwh\models\CwhPubblicazioni;
use open20\amos\cwh\models\CwhConfigContents;
use open20\amos\cwh\models\CwhPubblicazioniCwhNodiValidatoriMm;
use open20\amos\documenti\models\DocumentiCartellePath;
use open20\amos\documenti\utility\DocumentsUtility;
use open20\amos\community\models\Community;

/** @var $model \open20\amos\myactivities\basic\DocumentToValidate */
$adminModule = AmosAdmin::instance();
if ($model->modelClassName == 'open20\amos\documenti\models\Documenti'){
    $percorso = $model->titolo;
    $percorso = DocumentiCartellePath::getPath($model) . $percorso;
	$cwhconfig = CwhConfigContents::findOne(['classname'=>$model->modelClassName]);
    $cwhPubb = CwhPubblicazioni::find()->andWhere(['content_id' => $model->id])->andWhere(['cwh_config_contents_id' => $cwhconfig->id])->one();
    if (!is_null($cwhPubb)){
        $cwhPubblNodiVal = CwhPubblicazioniCwhNodiValidatoriMm::findOne(['cwh_pubblicazioni_id' => $cwhPubb->id]);
        $idCommunity = explode('-', $cwhPubblNodiVal->cwh_nodi_id);
        $community = Community::findOne(['id' => $idCommunity[1]]);
        $percorso = DocumentsUtility::getPercorsoCommunity($community, $percorso);
    }
} else {
    $percorso = $model->getTitle();
}



?>
<div class="wrap-activity">
    <div class="col-md-1 col-xs-2 icon-plugin">
        <?= AmosIcons::show('file-text-o', [], 'dash') ?>
    </div>
    <?php $labelKey = AmosMyActivities::t('amosmyactivities', 'Document Validation');
    if($model->is_folder){
        $labelKey = AmosMyActivities::t('amosmyactivities', 'Folder Validation');
    }?>
    <?= \open20\amos\myactivities\widgets\UserRequestValidation::widget([
        'model' => $model,
        'labelKey' => $labelKey,
        'text' => $percorso,
    ]) ?>
    
    <div class="col-md-3 col-xs-12 wrap-action">
    <?= Html::a(
        AmosIcons::show('check')
            . ' '
            . AmosMyActivities::t('amosmyactivities', 'Validate'),
            Yii::$app->urlManager->createUrl([
                '/documenti/documenti/validate-document',
                'id' => $model->id,
                'uid' => $user_id
            ]),
            ['class' => 'btn btn-primary']
        )
    ?>
        
    <?= Html::a(
        AmosIcons::show('close')
            . ' '
            . AmosMyActivities::t('amosmyactivities', 'Reject'),
        Yii::$app->urlManager->createUrl([
            '/documenti/documenti/reject-document',
            'id' => $model->id,
            'uid' => $user_id
        ]),
        ['class' => 'btn btn-secondary']
    )
    ?>
    </div>
</div>
<hr />
