<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Worksheets */

$this->title = 'แก้ไขไฟล์งานคุณภาพ: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'ไฟล์งานคุณภาพ', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="panel panel-info">
                        <div class="panel-heading"><h4><i class="glyphicon glyphicon-user"></i> แก้ไขไฟล์งานคุณภาพ</h4></div>
                        <div class="panel-body">
                        <div class="row">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
