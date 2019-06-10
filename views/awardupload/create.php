<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Awardupload */

$this->title = 'เพิ่มรางวัลยอดเยี่ยม';
$this->params['breadcrumbs'][] = ['label' => 'รางวัลดีเด่น', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="panel panel-danger">
                        <div class="panel-heading"><h4><i class="glyphicon glyphicon-user"></i> เพิ่มรางวัลดีเด่น ยอดเยี่ยม</h4></div>
                        <div class="panel-body">
                        <div class="row">
<div class="awardupload-create">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
