<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Recommend */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="recommend-form">

    <div class="col-md-6"><?php $form = ActiveForm::begin(); ?></div>

    <div class="col-md-6"><?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?></div>

    <div class="col-md-6"><?= $form->field($model, 'telephone')->textInput(['maxlength' => true]) ?></div>

    <div class= "col-md-6"><?= $form->field($model, 'recommend')->textarea(['rows' => 6]) ?></div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'บันทึก' : 'แก้ไข', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <button class="btn btn-info" type="reset">ล้างข้อมูล</button>
    </div>

    <?php ActiveForm::end(); ?>

</div>
