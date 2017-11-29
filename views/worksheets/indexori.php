<?php

use yii\widgets\ListView;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\DetailView;
use yii\db\Query;
use yii\helpers\Html;
use yii\models\Worksheets;
/* @var $this yii\web\View */
/* @var $searchModel app\models\WorksheetsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Worksheets');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="worksheets-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Worksheets'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

          //  'id',
          //  'ref',
            'worksheet_name',
             ['attribute'=>'covenant','value'=>function($model){return $model->listDownloadFiles('covenant');},'format'=>'html'],
            //'covenant',
          //  'docs',
             'created_by',
             'updated_by',
             'created_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    
</div>
