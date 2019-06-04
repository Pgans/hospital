<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AwarduploadSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Award';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="awardupload-index">


<div class="panel panel-info">
                        <div class="panel-heading"><h4><i class="glyphicon glyphicon-user"></i> ระบบการบันทึกรางวัลAwards</h4></div>
                        <div class="panel-body">
                        <div class="row">

    <p>
        <?= Html::a('เพิ่มรางวัลดีเด่น', ['create'], ['class' => 'btn btn-warning']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],
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
            //'id',
            'award_name',
            'fullname:ntext',
           // 'photo',
            'photos:ntext',
             'dep_id',
<<<<<<< HEAD
             ['class' => 'yii\grid\ActionColumn',
                'header'=>'คลิกดู',
                'headerOptions' => ['style' => 'width:20%'],
                'template'=>'<div class="btn-group btn-group-sm text-center" role="group"> {detail} {edit} {del} </div>',
                'buttons'=>[
                    'detail' => function($url,$model,$key){
                        return Html::a('View',
                            ['view', 'id' => $model->id],
                            ['class' => 'btn btn-inverse'],
                            $url);
                    },
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
            //['class' => 'yii\grid\ActionColumn'],
=======

            ['class' => 'yii\grid\ActionColumn'],
>>>>>>> 7874ffaaf3e721a60c969dae12abde57d60322fe
        ],
    ]); ?>
</div>
