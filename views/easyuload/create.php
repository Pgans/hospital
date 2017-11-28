<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Easyuload */

$this->title = 'Create Easyuload';
$this->params['breadcrumbs'][] = ['label' => 'Easyuloads', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="easyuload-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
