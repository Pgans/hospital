<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\Deaths30Search */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'แจ้งตายเครือข่าย';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="deaths30-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('เพิ่มการแจ้งตาย', ['create'], ['class' => 'btn btn-warning']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'id',
            'cid',
            'fullname',
            'cdeath',
            'ddeath',
            //'cmu',
            'created_by',
            // 'updated_by',
            'created_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
