<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PhotoLibrary */

$this->title = 'เพิ่มรูปภาพและกิจกรรมการรับบริจาค';
$this->params['breadcrumbs'][] = ['label' => 'รูปภาพและกิจกรรมการรับบริจาค', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="donate-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
         'initialPreview'=>[],
        'initialPreviewConfig'=>[]
    ]) ?>

</div>
