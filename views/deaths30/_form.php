<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Deaths30 */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="deaths30-form">

    <?php $form = ActiveForm::begin(); ?>


    <div class="col-md-6"><?= $form->field($model, 'cid')->textInput(['maxlength' => true]) ?></div>

    <div class="col-md-6"><?= $form->field($model, 'fullname')->textInput(['maxlength' => true]) ?></div>

    <div class="col-md-6"><?= $form->field($model, 'cdeath')->textInput(['maxlength' => true]) ?></div>

    <?= $form->field($model, 'ddeath')->widget(DatePicker::className(),[
        'inline' => false,
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd'
        ]
      ]);?>
     
     <div class="col-md-6"><?= $form->field($model, 'cmu')->textInput() ?></div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'บันทึก' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <button class="btn btn-info" type="reset">ล้างข้อมูล</button>
    </div>

    <?php ActiveForm::end(); ?>

</div>


