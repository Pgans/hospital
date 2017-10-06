<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'แผนที่';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-map">
    <h1><?= Html::encode($this->title) ?></h1>

<div class="well" align="center">
    <div class="embed-responsive embed-responsive-16by9">
      <iframe src="https://www.google.co.th/maps/@15.512037,104.729431,17z?hl=en" width="800" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>
</div>
</div>
