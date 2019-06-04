<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Runm301 */

$this->title = 'แก้ไขรายชื่อผู้แล่น ม่วน ม่วง: ' . $model->bib;
$this->params['breadcrumbs'][] = ['label' => 'Runm301s', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->bib, 'url' => ['view', 'id' => $model->bib]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="runm301-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
