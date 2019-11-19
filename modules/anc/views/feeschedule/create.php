<?php

use yii\helpers\Html;
use yii\grid\GridView;
//use kartik\grid\GridView;
use yii\widgets\Pjax;
use yii\data\ArrayDataProvider;
use app\module\huay\models\Sells;
//use kartik\editable\Editable;
use app\models\Bon;
use app\models\Belows;


/* @var $this yii\web\View */
/* @var $model app\modules\anc\models\Feeschedule */

$this->title = 'เพิ่มรายการ';
$this->params['breadcrumbs'][] = ['label' => 'Feeschedules', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="feeschedule-create">
<div class="panel panel-primary">
                        <div class="panel-heading"><h4><i class="glyphicon glyphicon-user"></i>เพิ่มรายการ ANC Fee_scheduleเครือข่ายทันตกรรม</h4></div>
                        <div class="panel-body">
                        <div class="row">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
</div>
</div>

<div>
<div class="panel panel-info">
                        <div class="panel-heading"><i class="glyphicon glyphicon-user"></i>Lists</div>
        <div class="well">
         <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'fee_id',
            'cid',
            'regdate',
            'regtime',
            'wight',
             'hieght',
             'ga',
             'gravida',
             'lmp',
             'icd10tm',
             'icd9cm_1',
             'icd9cm_2',
            // 'created_at',
            // 'updated_at',
            // 'created_by',
            // 'updated_by',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
