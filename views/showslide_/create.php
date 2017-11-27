<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Showslide */

$this->title = Yii::t('app', 'Create Showslide');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Showslides'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="showslide-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
