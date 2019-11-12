<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Worksheets */

$this->title = 'เพิ่มไฟล์งานคุณภาพ';
$this->params['breadcrumbs'][] = ['label' => 'ไฟล์งานคุณภาพ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="panel panel-warning">
                        <div class="panel-heading"><h4><i class="glyphicon glyphicon-user"></i> เพิ่มไฟล์งานคุณภาพ</h4></div>
                        <div class="panel-body">
                        <div class="row">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
