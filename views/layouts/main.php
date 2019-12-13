<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\MaterialAsset;
use app\assets\AppAsset;
//use app\assets\FontawesomeAsset;



///AppAsset::register($this);
//MaterialDesignIconicFontAsset::register($this);
MaterialAsset::register($this);
//AgencyAsset::register($this);
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
    <!-- <style>
    .black-ribbon {   position: fixed;   z-index: 9999;   width: 70px; }
    @media only all and (min-width: 768px) { .black-ribbon { width: auto; } }

    .stick-left { left: 0; }
    .stick-right { right: 0; }
    .stick-top { top: 0; }
    .stick-bottom { bottom: 0; } -->

    
    <body>
       
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
                        'label' => 'บริการ', 'visible',
                        'items' => [
                            ['label' => '<i class="glyphicon glyphicon-menu-right"></i> แพทย์แผนไทย', 'url' => ['/site/thaimed']],
                            ['label' => '<i class="glyphicon glyphicon-menu-right"></i> ศูนย์สุขภาพชุมชนม่วงสามสิบ', 'url' => ['/site/pcu']],
                            ['label' => '<i class="glyphicon glyphicon-menu-right"></i> ทันตกรรม', 'url' => ['/site/dental']],
                            ['label' => '<i class="glyphicon glyphicon-menu-right"></i> คลินิกพิเศษ', 'url' => ['/site/clinic']],
                            ['label' => '<i class="glyphicon glyphicon-menu-right"></i> อุบัติเหตุ-ฉุกเฉิน', 'url' => ['/site/er']],
                            ['label' => '<i class="glyphicon glyphicon-menu-right"></i> ห้องบัตร', 'url' => ['/site/register']],
                            
                        ],
                    ],
                    [
                        'label' => 'รับแจ้ง', 'visible',
                        'items' => [
                            ['label' => '<i class="glyphicon glyphicon-menu-right"></i> แจ้งข้อร้องเรียน-ร้องทุกข์', 'url' => ['/requests/create']],
                            ['label' => '<i class="glyphicon glyphicon-menu-right"></i> ข้อเสนอแนะ', 'url' => ['/recommend/create']],
                            ['label' => '<i class="glyphicon glyphicon-menu-right"></i> แจ้งเสียชีวิต', 'url' => ['/deaths30/create']],
                            
                        ],
                    ],
                    [
                        'label' => 'ยุทธศาสตร์', 'visible',
                        'items' => [
                            ['label' => '<i class="glyphicon glyphicon .glyphicon-info-sign"></i> ไฟล์ข้อมูล(New)', 'url' => ['/site/strategic']],
                            ['label' =>'<a href="https://drive.google.com/open?id=1YVc_2-ZIe1Z-ul9yphJIsgAn-iJ0J0NN" target="_blank">สเปคคอมพิวเตอร์ ICT_2562</a>'],
                            ['label' =>'<a href="https://drive.google.com/file/d/1JJb-H5_arwVX3YzzRXJiRRceOClN28mB/view?usp=sharing" target="_blank">การใช้งานHDC กระทรวงสาธรณสุข</a>'],
                            //['label' => '<i class="glyphicon glyphicon-menu-right"></i> แจ้งเสียชีวิต', 'url' => ['/deaths30/create']],
                            
                        ],
                    ],
                    [
                        'label' => 'สำนักคุณภาพ', 'visible',
                        'items' => [
                            ['label' => '<i class="glyphicon glyphicon-menu-right"></i> รางวัลAward', 'url' => ['/award/index']],
                            ['label' => '<i class="glyphicon glyphicon-menu-right"></i> อัฟโหลดไฟล์งานคุณภาพและนวัตถกรรม', 'url' => ['/cuality/index']],
                            ['label' => '<i class="glyphicon glyphicon-menu-right"></i> ไฟล์เอกสารที่เกี่ยวข้อง', 'url' => ['/site/quality']],
                           // ['label' => '<i class="glyphicon glyphicon-menu-right"></i> ห้องบัตร', 'url' => ['/site/register']],
                               
                        ],
                    ],
                    
                    // [
                    //     'label' => 'คู่มือ', 'visible',
                    //     'items' => [
                        
                    //         ['label' =>'<a href="https://drive.google.com/file/d/16C3Kt4w-wTaMJ0gmrEjx8oopXEc4Pcpc/view?usp=sharing" target="_blank">คู่มือการสำรองข้อมูลการเงินเครื่อข่ายม่วงสามสิบ(mBase)</a>'],
                    //         ['label' =>'<a href="https://drive.google.com/file/d/1JJb-H5_arwVX3YzzRXJiRRceOClN28mB/view?usp=sharing" target="_blank">การใช้งานHDC กระทรวงสาธรณสุข</a>'],
                    //     ],
                   // ],
                    ['label' => 'ใบงาน', 'url' => ['/worksheets/index']],
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
                            ['label' => '<i class="glyphicon glyphicon-menu-right"></i> Upload_Slide', 'url' => ['/slideupload/index'], 'visible' => !Yii::$app->user->isGuest],
                            '<li class="dropdown-header">เมนูไฟล์</li>',
                            ['label' => '<i class="glyphicon glyphicon-menu-right"></i> อัพโหลดไฟล์', 'url' => ['/freelance/admin'], 'visible' => !Yii::$app->user->isGuest],
                            '<li class="dropdown-header">เมนูอัลบั้มภาพ</li>',
                            ['label' => '<i class="glyphicon glyphicon-menu-right"></i> เพิ่มอัลบั้มภาพทั่วไป', 'url' => ['/photo-library/admin'], 'visible' => !Yii::$app->user->isGuest],
                            ['label' => '<i class="glyphicon glyphicon-menu-right"></i> เพิ่มอัลบั้มภาพรับบริจาค', 'url' => ['/donate/admin'], 'visible' => !Yii::$app->user->isGuest],
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
        <footer class="text-left">
            <div class="footer-above">
                <div class="container">
                    <div class="row">
                        
                        <div class="footer-col col-md-3">
                            <h3><i class="fa fa-fw fa-share-alt"></i> HOSPITAL</h3>
                            <li><a href="http://www.kkphospital.go.th" target="_blank">โรงพยาบาลกุดข้าวปุ้น</a></li>
                                    <li><a href="http://www.dmdhospital.com/" target="_blank">โรงพยาบาลดอนมดแดง</a></li>
                                    <li><a href="http://trakanhospital.moph.go.th/trakan/" target="_blank">โรงพยาบาลตระการพืชผล</a></li>
                                    <li><a href="http://www.tansumhospital.go.th/" target="_blank">โรงพยาบาลตาลสุม</a></li>
                                    <li><a href="http://www.nlhospital.go.th/" target="_blank">โรงพยาบาลนาจะหลวย</a></li>
                                    <li><a href="http://www.cupnatan.com/" target="_blank">โรงพยาบาลนาตาล</a></li>
                                    <li><a href="http://www.bundharikhos.com/hospital/" target="_blank">โรงพยาบาลบุณฑริก</a></li>
                                    <li><a href="http://www.pbhosp.com/" target="_blank">โรงพยาบาลพิบูลมังสาหาร</a></li>
                                    <li><a href="http://www.m30hospital.com/" target="_blank">โรงพยาบาลม่วงสามสิบ</a></li>
                                    <li><a href="http://www.warin.go.th/" target="_blank">โรงพยาบาลวารินชำราบ</a></li>
                                    <li><a href="http://www.smmhospital.com/" target="_blank">โรงพยาบาลศรีเมืองใหม่</a></li>
                                    <li><a href="http://www.detudomhospital.org" target="_blank">โรงพยาบาลสมเด็จพระยุพราชเดชอุดม</a></li>
                                    <li><a href="https://sunpasit.go.th/2014/index.php" target="_blank">โรงพยาบาลสรรพสิทธิประสงค์</a></li>
                                    <li><a href="http://www.sirinhospital.go.th/" target="_blank">โรงพยาบาลสิรินธร</a></li>
                                    <li><a href="http://www.kmhos.org/main/" target="_blank">โรงพยาบาลเขมราฐ</a></li>
                                    <li><a href="http://www.knhosp.go.th/" target="_blank">โรงพยาบาลเขื่องใน</a></li>
                                    <li><a href="http://www.khongchiamhospital.com/" target="_blank">โรงพยาบาลโขงเจียม</a></li>
                        </div>

                         <div class="footer-col col-md-3" align="left">
                            <h3><i class="fa fa-globe"></i> MIS</h3>
                            <li><a href="http://www.phoubon.in.th/" target="_blank">สำนักงานสาธารณสุขจังหวัดอุบลราชธานี</a></li>
                            <li><a href="http://sso14.net/" target="_blank">สำนักงานสาธารณสุขอำเภอม่วงสามสิบ</a></li>
                            <li><a href="https://ubn.hdc.moph.go.th/hdc/main/index_pk.php"" target="_blank">HDC จังหวัดอุบลราชธานี</a></li>
                            <li><a href="http://203.114.110.134:81/coopubon/" target="_blank">สหกรณ์ออมทรัพย์อุบลราชธานี</a></li>
                            <li><a href="http://uboncancer.go.th/ubcc2016v2/intro.php/" target="_blank">โรงพยาบาลมะเร็งอุบลราชธานี</a></li>
                            <li><a href="http://eclaim.nhso.go.th/webComponent/contact/ContactAction.do" target="_blank">E-Claim สปสช</a></li>
                            <!-- <li><a href="http://op.nhso.go.th/op/main/MainWebAction.do/" target="_blank">ตรวจสอบคุณภาพข้อมูล OP (สปสช.กลาง)</a></li> -->
                            <li><a href="https://www.chi.or.th/" target="_blank">สำนักสารสนเทศบริการสุขภาพ (chi.or.th)</a></li>
                            <li><a href="http://op.nhso.go.th/op/main/MainWebAction.do" target="_blank">OP/PP Individual Record (เว็บหน้าเขียว)</a></li>
                            
                            
                        </div> 
                        <div class="footer-col col-md-3">
                            <h3><i class="fa fa-fw fa-share-alt"></i> รพ.สต.</h3>

                                    <li><a href="http://www.sso14.net/sso14/D.HTM" target="_blank">1.รพ.สต.หนองเมือง 03697</a></li>
                                    <li><a href="http://www.sso14.net/sso14/R.HTM" target="_blank">2.รพ.สต.หนองแสง 03694</a></li>
                                    <li><a href="http://www.sso14.net/sso14/X.HTM" target="_blank">3.รพ.สต.สร้างมิ่ง 03698</a></li>
                                    <li><a href="http://www.sso14.net/sso14/M.HTM" target="_blank">4.รพ.สต.บัวยาง 03695</a></li>
                                    <li><a href="http://www.sso14.net/sso14/E.HTM" target="_blank">5.รพ.สต.หนองหลัก 03692</a></li>
                                    <li><a href="http://www.sso14.net/sso14/N.HTM" target="_blank">6.รพ.สต.ขมิ้น 03693</a></li>
                                    <li><a href="http://www.sso14.net/sso14/O.HTM" target="_blank">7.รพ.สต.หนองขุ่น 03710</a></li>
                                    <li><a href="http://www.sso14.net/sso14/S.HTM" target="_blank">8.รพ.สต.ผักระย่า 03708</a></li>
                                    <li><a href="http://www.sso14.net/sso14/Q.HTM" target="_blank">9.รพ.สต.หนองสองห้อง 03709</a></li>
                                    <li><a href="http://sso14.net/site/03712/index.html" target="_blank">10.รพ.สต.แสงไผ่ 03712</a></li>
                                    <li><a href="http://sso14.net/site/03713/index.html" target="_blank">11.รพ.สต.ทุ่งมณี 03713</a></li>
                                    <li><a href="http://www.sso14.net/sso14/G.HTM" target="_blank">12.รพ.สต.ไผ่ใหญ่ 03711</a></li>
                                    <li><a href="http://www.sso14.net/sso14/T.HTM" target="_blank">13.รพ.สต.หนองฮาง 03707</a></li>
                                    <li><a href="http://www.sso14.net/sso14/B.HTM" target="_blank">14.รพ.สต.หนองเหล่า 03705</a></li>
                                    <li><a href="http://www.sso14.net/sso14/V.HTM" target="_blank">15.รพ.สต.โพนแพง 03714</a></li>
                                    <li><a href="http://www.sso14.net/sso14/U.HTM" target="_blank">16.รพ.สต.ดอนแดงใหญ่ 03706</a></li>
                                    <li><a href="http://www.sso14.net/sso14/I.HTM" target="_blank">17.รพ.สต.หนองไข่นก 03704</a></li>
                                    <li><a href="http://www.m30hospital.com" target="_blank">18.PCU.ม่วงสามสิบ 99809</a></li>
                                    <li><a href="http://sso14.net/site/03696/index.html" target="_blank">19.รพ.สต.พระโรจน์ 03696</a></li>
                                    <li><a href="http://www.sso14.net/sso14/T.HTM" target="_blank">20.รพ.สต.น้ำคำแดง 03700</a></li>
                                    <li><a href="http://www.sso14.net/sso14/T.HTM" target="_blank">21.รพ.สต.โนนขวาว 03699</a></li>
                                    <li><a href="http://www.sso14.net/sso14/C.HTM" target="_blank">22.รพ.สต.ยางสักกระโพหลุ่ม 03702</a></li>
                                    <li><a href="http://www.sso14.net/sso14/J.HTM" target="_blank">23.รพ.สต.นาดี 03701</a></li>
                                    <li><a href="http://www.sso14.net/sso14/K.HTM" target="_blank">24.รพ.สต.ยางเครือ 03703</a></li>       
                        </div>

                        <div class="footer-col col-md-3">
                            <h3><i class="fa fa-fw fa-share-alt"></i> INTRANET</h3>

                                    <li><a href="http://192.168.200.9/meeting/index.php" target="_blank">จองห้องประชุม</a></li>
                                    <li><a href="http://192.168.200.9/yii2a-services/frontend/web/index.php?r=jobservice%2Findex" target="_blank">แจ้งหน่วยซ่อมบำรุง(พัสดุ)</a></li>
                                    <li><a href="http://192.168.200.9/yii2a-services/frontend/web/index.php?r=jobcom%2Findex" target="_blank">แจ้งซ่อมคอมพิวเตอร์และสื่อโสต</a></li>
                                    <li><a href="http://192.168.200.9/yii2a-services/frontend/web/index.php?r=carjobs%2Findex" target="_blank">บันทึกการใช้รถ</a></li> 
                                    <li><a href="http://192.168.200.9/yii2a-services/frontend/web/index.php?r=rfcar%2Fcaractivity" target="_blank">หมวดรายงานการใช้รถ</a></li>
                                    <li><a href="http://192.168.200.9/yii2a-services/frontend/web/index.php?r=opdcard%2Fpermits" target="_blank">แจ้งยืมเวชระเบียน</a></li>
                                    <li><a href="http://192.168.200.8/service-support/fullcalendar1_2.php" target="_blank">จองรถยนต์</a></li>
                        </div>

                        <div class="footer-col col-md-3">
                            <h3><i class="fa fa-map-marker" aria-hidden="true"></i> ที่ตั้ง</h3>
                            <p>โรงพยาบาลม่วงสามสิบ 378 หมู่ 10
                                <br>ต.ม่วงสามสิบ อ.ม่วงสามสิบ จ.อุบลราชธานี 34140
                                <br>โทร 0-45489-064
                            </p>
                            </div>

                         <div class="footer-col col-md-3">
                                <h3><i class="fa fa-globe"></i> จำนวนผู้เข้าชมเว็บ</h3>
                            <p>
                              <script type='text/javascript' src='http://www.siamecohost.com/member/gcounter/graphcount.php?page=m30hospital.com&style=02'>
                              </script>
                            </p>
                        </div>

                        
                    </div>
                </div>
            </div>
            </div>
            <!-- <div class="footer-below">
                <div class="container">
                    <div class="row">
                        <div class="col-8">
                            <p class="pull-left">&copy;  <?= date('Y') ?>  โรงพยาบาลม่วงสามสิบ </p>
                            <p class="pull-right">พัฒนาโดย ทีมสารสนเทศโรงพยาบาลม่วงสามสิบ </p>
                        </div>
                    </div>
                </div> 
            </div> -->
        </footer>
        

 <?php $this->endBody() ?>
       <style>
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
      </style>
    </body> 
</html>
<?php $this->endPage() ?> 
