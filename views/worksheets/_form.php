<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use kartik\widgets\FileInput;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Worksheets */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="worksheets-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    <?= $form->errorSummary($model); ?>

    <!--<?= $form->field($model, 'ref')->textInput(['maxlength' => true]) ?>-->

    <?= $form->field($model, 'worksheet_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'covenant')->widget(FileInput::classname(), [
    //'options' => ['accept' => 'image/*'],
    'pluginOptions' => [
        'initialPreview'=>$model->initialPreview($model->covenant,'covenant','file'),
        'initialPreviewConfig'=>$model->initialPreview($model->covenant,'covenant','config'),
        'allowedFileExtensions'=>['zip','pdf'],
        'showPreview' => true,
        'showCaption' => true,
        'showRemove' => true,
        'showUpload' => false
     ]
    ]); ?>

   <!-- <?= $form->field($model, 'docs')->textInput(['maxlength' => true]) ?>-->

    <!--<?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>-->

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
