<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SlideuploadSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Uploads';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="slideupload-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('เพิ่มภาพโชว์หน้าเว็บ', ['create'], ['class' => 'btn btn-warning']) ?>
    </p>
    <p>
        <?= Html::a('ขนาดไฟล์ 920x200 รองรับไฟล์ png เท่านั้น ความละเอียดภาพได้ไม่จำกัด') ?>
    </p>
    <p>
        <?= Html::a('กำหนดเล่นได้ 10 ภาพ ควรตั้งชื่อเรียงตามลำดับ เช่น 1.jpg, 2jpg   แล้ว  Uploads  ทับได้เลยครับ...', ['class' => 'btn btn-info']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

          //  'id',
            'name',
            'photo',
            'd_update',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
