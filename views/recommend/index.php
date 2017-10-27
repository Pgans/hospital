<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RecommendSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ข้อเสนอแนะ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recommend-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('เพิ่มข้อเสนอแนะ', ['create'], ['class' => 'btn btn-warning']) ?>
    </p>
    <div class='well'>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'id',
            'name',
            'telephone',
            'recommend:ntext',
            'created_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
</div>
