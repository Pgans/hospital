<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\questions */

$this->title = 'Update Questions: ' . $model->question_id;
$this->params['breadcrumbs'][] = ['label' => 'Questions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->question_id, 'url' => ['view', 'id' => $model->question_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="questions-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
