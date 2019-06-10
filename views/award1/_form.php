<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\FileInput;
use yii\helpers\ArrayHelper;
use app\models\Departments;
use dosamigos\datepicker\DatePicker;


/* @var $this yii\web\View */
/* @var $model app\models\Award1 */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="award1-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'award_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fullname')->textarea(['rows' => 6]) ?>

    <div class="row">
      <div class="col-md-2">
        <div class="well text-center">
          <?= Html::img($model->getPhotoViewer(),['style'=>'width:100px;','class'=>'img-rounded']); ?>
        </div>
      </div>
      <div class="col-md-10">
            <?= $form->field($model, 'photo')->fileInput() ?>
      </div>
    </div>

  <div class="col-md-6">
    <?= $form->field($model, 'dep_id')->dropDownList(
            ArrayHelper::map(Departments::find()->all(),'id','name'),
            ['prompt'=>'เลือกแผนก']
            ) ?>
  </div>

  <div class="col-md-6">
            <?= $form->field($model,'receive_date')->widget(DatePicker::className(),[
        'inline' => false,
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd'
        ]
      ]);?>
    
  

<div class="form-group">
        <?= Html::submitButton('<i class="glyphicon glyphicon-plus"></i> '.($model->isNewRecord ? 'บันทึกข้อมูล' : 'แก้ไข'), 
        ['class' => ($model->isNewRecord ? 'btn btn-primary' : 'btn btn-info').' btn-lg btn-block']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>
