<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\anc\models\Feeschedule */

$this->title = $model->fee_id;
$this->params['breadcrumbs'][] = ['label' => 'Feeschedules', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="feeschedule-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->fee_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->fee_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'fee_id',
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
            'created_at',
            'updated_at',
            'created_by',
            'updated_by',
        ],
    ]) ?>

</div>
