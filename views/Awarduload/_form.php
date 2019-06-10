<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\FileInput;
use yii\helpers\ArrayHelper;
use app\models\Departments;

/* @var $this yii\web\View */
/* @var $model app\models\Awarduload */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="awarduload-form">

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
    <!-- <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?> -->

    <div class="col-md-6">
    <?= $form->field($model, 'dep_id')->dropDownList(
        ArrayHelper::map(Departments::find()->all(),'id','name'),
        ['prompt'=>'เลือกแผนก']
        ) ?>
    </div>

    <div class="col-md-6">
                    <?= $form->field($model, 'docs[]')->widget(FileInput::classname(), [
                'options' => [
                    //'accept' => 'image/*',
                    'multiple' => true
                ],
                'pluginOptions' => [
                    'initialPreview'=>[],
                    //'allowedFileExtensions'=>['pdf'],
                    'showPreview' => false,
                    'showCaption' => true,
                    'showRemove' => true,
                    'showUpload' => false
                ]
                ]); ?>
        </div>

    <div class="form-group">
        <?= Html::submitButton('<i class="glyphicon glyphicon-plus"></i> '.($model->isNewRecord ? 'บันทึกข้อมูล' : 'แก้ไข'), ['class' => ($model->isNewRecord ? 'btn btn-success' : 'btn btn-primary').' btn-lg btn-block']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
