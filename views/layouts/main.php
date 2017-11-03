<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\MaterialAsset;

MaterialAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <style>
    .black-ribbon {   position: fixed;   z-index: 9999;   width: 70px; }
    @media only all and (min-width: 768px) { .black-ribbon { width: auto; } }

    .stick-left { left: 0; }
    .stick-right { right: 0; }
    .stick-top { top: 0; }
    .stick-bottom { bottom: 0; }

    </style>
    // <!-- เริ่ม popup -->
    // <script>
    //     function openColorBox(){
    //     //กำหนดขนาดและหน้าเว็บที่จะแสดงใน popup สามารถใส่เป็นภาพก็ได้นะครับ
    //       $.colorbox({iframe:true, width:"900px", height:"600px", href: "images/1.png"});
    //     }

    //     function countDown(){
    //       seconds--
    //       $("#seconds").text(seconds);
    //       if (seconds === 0){
    //         openColorBox();
    //         clearInterval(i);
    //       }
    //     }
    //     //กำหนดเวลา วินาทีที่จะให้ popup ทำงาน
    //     var seconds = 2,
    //         i = setInterval(countDown, 1000);
    // </script>
    // <!-- สิ้นสุด popup -->
    <body>
        <?php $this->beginBody() ?>
        <img src="images/black_ribbon_top_left.png" class="black-ribbon stick-top stick-left"/>
        <div class="wrap">
            <?php
            NavBar::begin([
                'brandLabel' => '<img src="images/moph.png" style="display:inline; vertical-align: top; height:32px;" class="img-responsive"> โรงพยาบาลม่วงสามสิบ',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav'],
                'encodeLabels'=>false,
                'items' => [
                    ['label' => 'หน้าแรก', 'url' => ['/site/index']],
                    [
                        'label' => 'เกี่ยวกับ', 'visible',
                        'items' => [
                            ['label' => '<i class="glyphicon glyphicon-menu-right"></i> ประวัติโรงพยาบาล', 'url' => ['/site/basic']],
                            ['label' => '<i class="glyphicon glyphicon-menu-right"></i> โครงสร้างองค์กร', 'url' => ['/site/struc_m30']],
                            ['label' => '<i class="glyphicon glyphicon-menu-right"></i> วิสัยทัศน์ พันธกิจ', 'url' => ['/site/structure']],
                            ['label' => '<i class="glyphicon glyphicon-menu-right"></i> บุคลากร', 'url' => ['/site/personnelx']],
                            ['label' => '<i class="glyphicon glyphicon-menu-right"></i> แผนที่', 'url' => ['/site/map_m30']],
                        ],
                    ],
                    //['label' => 'นโยบายและแผน', 'url' => ['/site/policy_planx']],
                    //['label' => 'คลังข้อมูล', 'url' => ['/site/dhdcservicex']],
                    [
                        'label' => 'การให้บริการ', 'visible',
                        'items' => [
                            ['label' => '<i class="glyphicon glyphicon-menu-right"></i> แพทย์แผนไทย', 'url' => ['/site/thaimed']],
                            ['label' => '<i class="glyphicon glyphicon-menu-right"></i> ศูนย์สุขภาพชุมชนม่วงสามสิบ', 'url' => ['/site/pcu']],
                            //['label' => '<i class="glyphicon glyphicon-menu-right"></i> วิสัยทัศน์ พันธกิจ', 'url' => ['/site/structurex']],
                            
                        ],
                    ],
                    [
                        'label' => 'ศูนย์รับแจ้ง', 'visible',
                        'items' => [
                            ['label' => '<i class="glyphicon glyphicon-menu-right"></i> แจ้งข้อร้องเรียน-ร้องทุกข์', 'url' => ['/requests/create']],
                            ['label' => '<i class="glyphicon glyphicon-menu-right"></i> ข้อเสนอแนะ', 'url' => ['/recommend/create']],
                            //['label' => '<i class="glyphicon glyphicon-menu-right"></i> วิสัยทัศน์ พันธกิจ', 'url' => ['/site/structurex']],
                            
                        ],
                    ],
                    ['label' => 'ดาวน์โหลด', 'url' => ['/freelance/index']],
                //['label' => 'เกี่ยวกับ', 'url' => ['/site/about']],
                ],
            ]);

            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'encodeLabels'=>false,
                'items' => [
                    [
                        'label' => '<i class="glyphicon glyphicon-wrench"></i> จัดการเว็บไซต์', 'visible' => !Yii::$app->user->isGuest,
                        'items' => [
                            //'<li class="divider"></li>',
                            '<li class="dropdown-header">เมนูข่าว</li>',
                            ['label' => '<i class="glyphicon glyphicon-menu-right"></i> จัดการหมวดหมู่', 'url' => ['/newscategory/index'], 'visible' => !Yii::$app->user->isGuest],
                            ['label' => '<i class="glyphicon glyphicon-menu-right"></i> จัดการข่าวสาร', 'url' => ['/news/admin'], 'visible' => !Yii::$app->user->isGuest],
                            ['label' => '<i class="glyphicon glyphicon-menu-right"></i> จัดการข้อร้องเรียน', 'url' => ['/requests/index'], 'visible' => !Yii::$app->user->isGuest],
                            ['label' => '<i class="glyphicon glyphicon-menu-right"></i> จัดการข้อเสนอแนะ', 'url' => ['/recommend/index'], 'visible' => !Yii::$app->user->isGuest],
                            '<li class="dropdown-header">เมนูไฟล์</li>',
                            ['label' => '<i class="glyphicon glyphicon-menu-right"></i> อัพโหลดไฟล์', 'url' => ['/freelance/admin'], 'visible' => !Yii::$app->user->isGuest],
                            '<li class="dropdown-header">เมนูอัลบั้มภาพ</li>',
                            ['label' => '<i class="glyphicon glyphicon-menu-right"></i> เพิ่มอัลบั้มภาพ', 'url' => ['/photo-library/admin'], 'visible' => !Yii::$app->user->isGuest],
                            '<li class="dropdown-header">เมนูปฏิบัติงาน/กิจกรรม</li>',
                            ['label' => '<i class="glyphicon glyphicon-menu-right"></i> เพิ่มตารางปฏิบัติงาน/กิจกรรม', 'url' => ['/event/admin'], 'visible' => !Yii::$app->user->isGuest],
                        ],
                    ],
                    Yii::$app->user->isGuest ?
                            ['label' => 'เข้าสู่ระบบ', 'url' => ['/user/security/login']] :
                            ['label' => 'ยินดีต้อนรับ (' . Yii::$app->user->identity->username . ')', 'items' => [
                            ['label' => '<i class="glyphicon glyphicon-menu-right"></i> โพรไฟล์', 'url' => ['/user/profile']],
//                            ['label' => 'ตั้งค่าโพรไฟล์', 'url' => ['/user/settings/profile']],
                            ['label' => '<i class="glyphicon glyphicon-menu-right"></i> จัดการผู้ใช้', 'url' => ['/user/admin/index']],
                            ['label' => '<i class="glyphicon glyphicon-log-out"></i> ออกจากระบบ', 'url' => ['/user/security/logout'], 'linkOptions' => ['data-method' => 'post']],
                        ]],
                //['label' => 'สมัครสมาชิก', 'url' => ['/user/registration/register'], 'visible' => Yii::$app->user->isGuest],
                ],
            ]);

            NavBar::end();
            ?>

            <div class="container" style="margin-top: 65px;">
                <?=
                Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ])
                ?>
                <?= $content ?>
            </div>

        </div>

        <?=
        \ibrarturi\scrollup\ScrollUp::widget([
            'theme' => 'image', // pill, link, image, tab
        ]);
        ?>
        <footer class="text-center">
            <div class="footer-above">
                <div class="container">
                    <div class="row">
                        <div class="footer-col col-md-4">
                            <h3><i class="fa fa-map-marker" aria-hidden="true"></i> ที่ตั้ง</h3>
                            <p>โรงพยาบาลม่วงสามสิบ 378 หมู่ 10
                                <br>ต.ม่วงสามสิบ อ.ม่วงสามสิบ จ.อุบลราชธานี 34140
                                <br>โทร 0-45489-064</p>

                        </div>
                        <div class="footer-col col-md-4">
                            <h3><i class="fa fa-fw fa-share-alt"></i> Around the Web</h3>
                            <ul class="list-inline">
                                <li>
                                    <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-google-plus"></i></a>
                                </li>
                                <li>
                                    <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-linkedin"></i></a>
                                </li>
                                <li>
                                    <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-dribbble"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="footer-col col-md-4" align="center">
                            <h3><i class="fa fa-globe"></i> จำนวนผู้เข้าชมเว็บ</h3>
                            <p>
                              <script type='text/javascript' src='http://www.siamecohost.com/member/gcounter/graphcount.php?page=m30hospital.com&style=02'>
                              </script>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-below">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <p class="pull-left">&copy;  <?= date('Y') ?>  โรงพยาบาลม่วงสามสิบ</p>
                            <p class="pull-right">พัฒนาโดย ทีมสารสนเทศโรงพยาบาลม่วงสามสิบ </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

<?php $this->endBody() ?>
      <!-- /*<style>
      body{
          -moz-filter: grayscale(100%);
           IE
          filter: progid:DXImageTransform.Microsoft.BasicImage(grayscale=1);
          filter: gray;
           Chrome, Safari
          -webkit-filter: grayscale(1);
           Firefox
          filter: grayscale(1);
      }
      </style>*/ -->
    </body>
</html>
<?php $this->endPage() ?>
