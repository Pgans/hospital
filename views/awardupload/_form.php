<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\FileInput;
use yii\helpers\ArrayHelper;
use app\models\Departments;



/* @var $this yii\web\View */
/* @var $model app\models\Awardupload */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="awardupload-form">

    <?php $form = ActiveForm::begin([
      'options' => ['enctype' => 'multipart/form-data']
    ]); ?>
<div class="col-md-8">
    <?= $form->field($model, 'award_name')->textInput(['maxlength' => true]) ?>
</div>
<div class = "col-md-4">
<?= $form->field($model, 'dep_id')->dropDownList(
        ArrayHelper::map(Departments::find()->all(),'id','name'),
        ['prompt'=>'เลือกแผนก']
        ) ?>
</div>
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

    <div class="form-group">
        <?= Html::submitButton('<i class="glyphicon glyphicon-plus"></i> '.($model->isNewRecord ? 'บันทึกข้อมูล' : 'แก้ไข'), 
        ['class' => ($model->isNewRecord ? 'btn btn-info' : 'btn btn-info').' btn-lg btn-block']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
