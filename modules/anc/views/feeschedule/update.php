<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\anc\models\Feeschedule */

$this->title = 'Update Feeschedule: ' . $model->fee_id;
$this->params['breadcrumbs'][] = ['label' => 'Feeschedules', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->fee_id, 'url' => ['view', 'id' => $model->fee_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="feeschedule-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
