<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Slideupload */

$this->title = 'Update Slideupload: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Slideuploads', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="slideupload-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
