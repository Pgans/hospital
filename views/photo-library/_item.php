<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use yii\helpers\HtmlPurifier;
?>
<?php
$baseUrl = Yii::getAlias('@web');
$basePath = Yii::getAlias('@webroot');
$time = time();
?>
<!--<div class="media">
    <div class="media-body">
        <a href="<?= Url::to(['/photo-library/view', 'id' => $model->id]); ?>">
            <h5 class="media-heading"><i class="fa fa-picture-o" aria-hidden="true"></i> <?php echo $model->event_name; ?></h5>
        </a>
	</div>
        <i class="fa fa-calendar" aria-hidden="true"></i> <?php echo $model->start_date; ?>
    
</div>-->
<div class="col-sm-4 col-xs-6">
    <div class="panel panel-default">
        <div class="thumbnail">
            <a href="<?= Url::to(['/photo-library/view', 'id' => $model->id]); ?>" style="text-decoration: none;">
             <div style="float: left;overflow: hidden;height: 150px;display: block;width: 100%;margin-bottom: 5px;border-bottom: 1px solid #eee;background: #efefef;"> 
                <?= $model->getPhotcover($model->ref); ?>
            </div>
                <hr>
                <h5 class="media-heading"><?php echo $model->event_name; ?> </h5>
                <!-- <i class="fa fa-picture-o" aria-hidden="true"></i> <?php echo $model->event_name; ?> -->
            </a>
            <p />
            <small class="text-muted">
              <i class="fa fa-clock-o"></i> <?php echo $model->start_date; ?> <i class="fa fa-user"></i> Admin <span class="badge btn-info"><i class="fa fa-eye" aria-hidden="true"></i> <?php echo $model->view; ?></span>
            </small>
        </div>
    </div>
</div>



<!-- <div class="col-sm-4 col-xs-6">
    <div class="panel panel-default">
        <div class="thumbnail">
            <a href="<?= Url::to(['/photo-library/view', 'id' => $model->id]); ?>" style="text-decoration: none;">
            <div style="float: left;overflow: hidden;height: 150px;display: block;width: 100%;margin-bottom: 5px;border-bottom: 1px solid #eee;background: #efefef;">
                <?= $model->getPhotcover($model->ref); ?>
            </div>
                <hr>
                <div class="text-left" style="hieght:55px; width:>100%; overflow: hidden; ">
                <i class="fa fa-picture-o" aria-hidden="true"></i> <?php echo $model->event_name; ?>
                
            </a>
            </div>
            <p />
            <small class="text-muted">
              <i class="fa fa-clock-o"></i> <?php echo $model->start_date; ?> <i class="fa fa-user"></i> Admin
            </small>
        </div>
    </div>
</div> -->
