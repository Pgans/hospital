<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\captcha\Captcha;


/* @var $this yii\web\View */
/* @var $model app\models\Requests */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="requests-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->field($model, 'fullname')->textInput(['maxlength' => true]) ?>
  
 
    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
    
    
    <?= $form->field($model, 'telephone')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'request_text')->textInput(['maxlength' => true]) ?>

    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
