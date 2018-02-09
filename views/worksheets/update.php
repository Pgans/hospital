<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Worksheets */

$this->title = 'Update Worksheets: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'ใบงานต่างๆ', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="worksheets-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
