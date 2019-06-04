<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Runm301Search */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="runm301-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'bib') ?>

    <?= $form->field($model, 'fullname') ?>

    <?= $form->field($model, 'tel') ?>

    <?= $form->field($model, 'fname') ?>

    <?= $form->field($model, 'lname') ?>

    <?php // echo $form->field($model, 'category') ?>

    <?php // echo $form->field($model, 'serial') ?>

    <?php // echo $form->field($model, 'size') ?>

    <?php // echo $form->field($model, 'shirth') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
