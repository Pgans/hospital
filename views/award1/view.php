<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Award1 */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Award1s', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="award1-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
            'id',
            'award_name',
            'fullname:ntext',
            [
                'format'=>'raw',
                'attribute'=>'photo',
                'value'=>Html::img($model->photoViewer,['class'=>'img-thumbnail','style'=>'width:200px;'])
            ],
            //'photos:ntext',
            'receive_date',
            'created_at',
            'updated_at',
            'createdBy.username',
           // 'updatedBy.username',
            'dep.name',
        ],
    ]) ?>

</div>
