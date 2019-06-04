<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Runm301 */

$this->title = 'เพิ่มผู้สมัคร';
$this->params['breadcrumbs'][] = ['label' => 'Runm301s', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="runm301-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
