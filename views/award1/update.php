<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Award1 */

$this->title = 'Update Award1: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Award1s', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="award1-update">

    <div class="panel panel-danger">
                        <div class="panel-heading"><h4><i class="glyphicon glyphicon-user"></i> ระบบการบันทึกรางวัลAwards</h4></div>
                        <div class="panel-body">
                        <div class="row">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
