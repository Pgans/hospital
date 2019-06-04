<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\Runm301Search */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'แล่น ม่วน ม่วง';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="runm301-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('เพิ่มผู้สมัครแล่น', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'bib',
            'fullname',
            'tel',
            //'fname',
           // 'lname',
             'category',
             'serial',
             'size',
            // 'shirth',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
