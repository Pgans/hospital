<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Award1 */

$this->title = 'เพิ่มรางวัลAwards';
$this->params['breadcrumbs'][] = ['label' => 'Award1', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="award1-create">

    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>