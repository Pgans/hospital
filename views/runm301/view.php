<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Runm301 */

$this->title = $model->bib;
$this->params['breadcrumbs'][] = ['label' => 'Runm301s', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="runm301-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->bib], ['class' => 'btn btn-primary']) ?>
        <!-- <?= Html::a('Delete', ['delete', 'id' => $model->bib], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?> -->
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'bib',
            'fullname',
            'tel',
            'fname',
            'lname',
            'category',
            'serial',
            'size',
            'shirth',
        ],
    ]) ?>

</div>
