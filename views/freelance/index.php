<?php
use yii\widgets\ListView;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\DetailView;
use yii\db\Query;
use yii\helpers\Html;
use yii\models\Freelance;

/* @var $this yii\web\View */
$this->title = 'ดาวน์โหลดไฟล์';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="panel panel-warning">
                        <div class="panel-heading"><h4><i class="glyphicon glyphicon-download-alt"></i> ดาวน์โหลดไฟล์</h4></div>
                        <div class="panel-body">
                        <div class="row">

  <?= GridView::widget([
      'dataProvider' => $dataProvider,
//      'filterModel' => $searchModel,
      'columns' => [
          ['class' => 'yii\grid\SerialColumn'],
          'title',
          ['attribute'=>'covenant','value'=>function($model){return $model->listDownloadFiles('covenant');},'format'=>'html'],
          'create_date',
        ],
        'layout' => '{items}{pager}',
  ]); ?>
</div>
<!-- </div> -->
