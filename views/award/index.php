<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\awardSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'รางวัลAward';
$this->params['breadcrumbs'][] = $this->title;
?>
 <div class="panel panel-danger">
                        <div class="panel-heading"><h4><i class="glyphicon glyphicon-user"></i> รางวัลดีเด่น ยอดเยี่ยม</h4></div>
                        <div class="panel-body">
                        <div class="row">

    <p>
        <?= Html::a('เพิ่มรางวัล', ['create'], ['class' => 'btn btn-warning']) ?>
    </p>
    <p><?= Html::a('รองรับประเภทไฟล์ pdf, doc, docx, xls, xlsx')?></p>
    <div class="site-index">
  <?= GridView::widget([
      'dataProvider' => $dataProvider,
      'filterModel' => $searchModel,
      'columns' => [
          ['class' => 'yii\grid\SerialColumn'],
          [
            'options'=>['style'=>'width:150px;'],
            'format'=>'raw',
            'attribute'=>'photo',
            'value'=>function($model){
              return Html::tag('div','',[
                'style'=>'width:150px;height:95px;
                          border-top: 10px solid rgba(255, 255, 255, .46);
                          background-image:url('.$model->photoViewer.');
                          background-size: cover;
                          background-position:center center;
                          background-repeat:no-repeat;
                          ']);
            }
        ],
        'name',
         'surname:ntext',
          
         // 'title',
          ['attribute'=>'covenant','value'=>function($model){return $model->listDownloadFiles('covenant');},'format'=>'html'],
          'create_date',
          ['class' => 'yii\grid\ActionColumn'],
        ],
        'layout' => '{items}{pager}',
  ]); ?>
</div>
