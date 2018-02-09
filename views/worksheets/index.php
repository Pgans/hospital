<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\WorksheetsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ใบงานต่างๆ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="worksheets-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('เพิ่มใบงาน', ['create'], ['class' => 'btn btn-warning']) ?>
    </p>
    <p><?= Html::a('รองรับประเภทไฟล์ pdf, doc, docx, xls, xlsx')?></p>
    <div class="site-index">
  <?= GridView::widget([
      'dataProvider' => $dataProvider,
      'filterModel' => $searchModel,
      'columns' => [
          ['class' => 'yii\grid\SerialColumn'],
          'title',
          ['attribute'=>'covenant','value'=>function($model){return $model->listDownloadFiles('covenant');},'format'=>'html'],
          'create_date',
          ['class' => 'yii\grid\ActionColumn'],
        ],
        'layout' => '{items}{pager}',
  ]); ?>
</div>
