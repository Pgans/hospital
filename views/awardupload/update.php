<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Awardupload */

$this->title = 'แก้ไขAward: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Awarduploads', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'แก้ไข';
?>
<div class="awardupload-update">

    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
