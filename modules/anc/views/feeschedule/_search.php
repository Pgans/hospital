<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\anc\models\FeescheduleSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="feeschedule-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'fee_id') ?>

    <?= $form->field($model, 'cid') ?>

    <?= $form->field($model, 'regdate') ?>

    <?= $form->field($model, 'regtime') ?>

    <?= $form->field($model, 'wight') ?>

    <?php // echo $form->field($model, 'hieght') ?>

    <?php // echo $form->field($model, 'ga') ?>

    <?php // echo $form->field($model, 'gravida') ?>

    <?php // echo $form->field($model, 'lmp') ?>

    <?php // echo $form->field($model, 'icd10tm') ?>

    <?php // echo $form->field($model, 'icd9cm_1') ?>

    <?php // echo $form->field($model, 'icd9cm_2') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
