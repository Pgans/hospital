<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\anc\models\FeescheduleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Feeschedules';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="feeschedule-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Feeschedule', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'fee_id',
            'cid',
            'regdate',
            'regtime',
            'wight',
            // 'hieght',
            // 'ga',
            // 'gravida',
            // 'lmp',
            // 'icd10tm',
            // 'icd9cm_1',
            // 'icd9cm_2',
            // 'created_at',
            // 'updated_at',
            // 'created_by',
            // 'updated_by',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
