<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Deaths30 */

$this->title = 'Create Deaths30';
$this->params['breadcrumbs'][] = ['label' => 'Deaths30s', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="deaths30-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
