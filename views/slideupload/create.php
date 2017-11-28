<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Slideupload */

$this->title = 'เพิ่มภาพโชว์หน้าเว็บ';
$this->params['breadcrumbs'][] = ['label' => 'Slideuploads', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="slideupload-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
