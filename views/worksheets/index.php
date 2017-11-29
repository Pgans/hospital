<?php
use yii\widgets\ListView;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\DetailView;
use yii\db\Query;
use yii\helpers\Html;
use yii\models\Worksheets;

/* @var $this yii\web\View */
$this->title = 'ดาวน์โหลดไฟล์';
$this->params['breadcrumbs'][] = $this->title;

?>
<h1><i class="glyphicon glyphicon-circle-arrow-down"></i> ดาวน์โหลดไฟล์</i></h1>
<!-- <div class="well"> -->
<div class="site-index">
  <?= GridView::widget([
      'dataProvider' => $dataProvider,
//      'filterModel' => $searchModel,
      'columns' => [
          ['class' => 'yii\grid\SerialColumn'],
          'worksheet_name',
          ['attribute'=>'covenant','value'=>function($model){return $model->listDownloadFiles('covenant');},'format'=>'html'],
          'created_by',
            // 'updated_by',
            'created_at',
        ],
        'layout' => '{items}{pager}',
  ]); ?>
</div>
<!-- </div> -->


columns' => [
            ['class' => 'yii\grid\SerialColumn'],

          //  'id',
           // 'ref',
            'worksheet_name',
            'covenant',
           // 'docs',
             'created_by',
            // 'updated_by',
            'created_at',
