<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\models\Freelance;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FreelanceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'อัพโหลดไฟล์';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="panel panel-info">
                        <div class="panel-heading"><h4><i class="glyphicon glyphicon-circle-arrow-up"></i>อัพโหลดไฟล์</h4></div>
                        <div class="panel-body">
                        <div class="row">
    
 
    <?= Html::button('<i class="glyphicon glyphicon-plus"></i>เพิ่มอัพโหลดไฟล์', ['value'=>Url::to(['freelance/create']), 'class' =>
     'btn btn-success btn-lg btn-block btn-raised','id'=>'modalButton']); ?> 
     </p>
     <p><?= Html::a('รองรับประเภทไฟล์ pdf, doc, docx, xls, xlsx')?></p>

<?php Modal::begin([
    'id' => 'modal',
    'header' => '<h4><a color-blue>UPLOAD FILES</a></h4>',
    'size'=>'modal-lg',
    'footer' => '<a href="#" class="btn btn-warning" data-dismiss="modal">ปิด</a>',
    ]);
    echo "<div id='modalContent'></div>";
    Modal::end();
    ?>
    <? Pjax::begin()?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            ['attribute'=>'covenant','value'=>function($model){return $model->listDownloadFiles('covenant');},'format'=>'html'],
            'create_date',

            ['class' => 'yii\grid\ActionColumn',
            'header'=>'คลิกดู',
            'headerOptions' => ['style' => 'width:13%'],
            'template'=>'<div class="btn-group btn-group-sm text-center" role="group"> {detail} {edit} {del} </div>',
            'buttons'=>[
                'edit' => function($url,$model,$key){
                    return Html::a('ปรับปรุง',
                        ['update', 'id' => $model->id],
                        ['class' => 'btn btn-success'],
                        $url);
                },
                'del' => function($url,$model,$key){
                    return Html::a('ลบ',
                        ['delete', 'id' => $model->id],
                        ['class' => 'btn btn-danger'],
                        $url);
                },
            ],
        ],
  
       ],
   ]); ?>
   <? Pjax::end() ?>
</div>
<?php
$this->registerJsFile('@web/js/main.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
 ?>