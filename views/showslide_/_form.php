<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Showslide */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="showslide-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'showslide_img')->fileInput() ?>
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'บันทึก') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-warning' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>


