<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Awarduload */

$this->title = 'Create Awarduload';
$this->params['breadcrumbs'][] = ['label' => 'Awarduloads', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="awarduload-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
