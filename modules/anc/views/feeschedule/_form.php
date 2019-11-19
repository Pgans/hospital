<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\anc\models\Feeschedule */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="feeschedule-form">

    <?php $form = ActiveForm::begin(); ?>

    <!-- <?= $form->field($model, 'fee_id')->textInput() ?> -->
    <div class="col-md-3"><?= $form->field($model, 'cid')->textInput(['maxlength' => true]) ?></div>
    
    <div class="col-md-3"><?= $form->field($model, 'regdate')->textInput() ?></div>

    <div class="col-md-3"><?= $form->field($model, 'regtime')->textInput() ?></div>

    <div class="col-md-3"><?= $form->field($model, 'wight')->textInput(['maxlength' => true]) ?></div>

    <div class="col-md-3"><?= $form->field($model, 'hieght')->textInput(['maxlength' => true]) ?></div>

    <div class="col-md-3"><?= $form->field($model, 'ga')->textInput(['maxlength' => true]) ?></div>

    <div class="col-md-3"><?= $form->field($model, 'gravida')->textInput(['maxlength' => true]) ?></div>

     <div class="col-md-3"><?= $form->field($model, 'lmp')->textInput() ?></div>

    <div class="col-md-3"><?= $form->field($model, 'icd10tm')->textInput(['maxlength' => true]) ?></div>

     <div class="col-md-3"> <?= $form->field($model, 'icd9cm_1')->textInput(['maxlength' => true]) ?></div>

      <div class="col-md-3"><?= $form->field($model, 'icd9cm_2')->textInput(['maxlength' => true]) ?></div>

    <!-- <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput() ?> -->

    <div class="form-group">
        <?= Html::submitButton('<i class="glyphicon glyphicon-plus"></i> '.($model->isNewRecord ? 'บันทึกข้อมูล' : 'แก้ไข'), 
        ['class' => ($model->isNewRecord ? 'btn btn-primary' : 'btn btn-info')]) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>
