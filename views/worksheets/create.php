<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Worksheets */

$this->title = 'เพิ่มใบงาน';
$this->params['breadcrumbs'][] = ['label' => 'ใบงานต่างๆ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="worksheets-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
