<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\User;
use yii\bootstrap\Modal;
use yii\helpers\Url;


$this->title = 'แจ้งผู้เสียชีวิต';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php
use yii\helpers\ArrayHelper;
?>

<?php if(Yii::$app->session->hasFlash('alert')):?>
    <?= \yii\bootstrap\Alert::widget([
    'body'=>ArrayHelper::getValue(Yii::$app->session->getFlash('alert'), 'body'),
    'options'=>ArrayHelper::getValue(Yii::$app->session->getFlash('alert'), 'options'),
    ])?>
<?php endif; ?>


<div class="deaths30-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('เพิ่มผู้เสียชีวิต', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Modal::begin([
        'id' => 'modal',
        'header' => '<h4><a color-blue>CREATE DEATHS30</a></h4>',
        'size'=>'modal-lg',
        'footer' => '<a href="#" class="btn btn-primary" data-dismiss="modal">ปิด</a>',
        ]);
        echo "<div id='modalContent'></div>";
        Modal::end();
        ?>
    
<?php Pjax::begin(); ?>    
<?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'cid',
            'fullname',
            'createdBy.username',
            //'updated_by',
            'created_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>

