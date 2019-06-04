<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AwarduploadSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="awardupload-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'award_name') ?>

    <?= $form->field($model, 'fullname') ?>

    <?= $form->field($model, 'photo') ?>

    <?= $form->field($model, 'photos') ?>

    <?php // echo $form->field($model, 'dep_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
