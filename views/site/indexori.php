<?php

use yii\widgets\ListView;
use yii\grid\GridView;
//use app\components\RctReplyWidget;
use kartik\tabs\TabsX;
use yii\helpers\Url;
use evgeniyrru\yii2slick\Slick;
use yii\bootstrap\Modal;
use yii\helpers\Html;

/* @var $this yii\web\View */
$this->title = 'โรงพยาบาลม่วงสามสิบ อำเภอม่วงสามสิบ จังหวัดอุบลราชธานี';
// register css files


$this->registerCssFile("@web/owl.carousel/owl-carousel/owl.carousel.css");
// $this->registerCssFile("@web/owl.carousel/owl-carousel/owl.theme.css");

//register js files
$this->registerJsFile("@web/owl.carousel/owl-carousel/owl.carousel.min.js", ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsFile("@web/js/index.js", ['depends' => [\yii\web\JqueryAsset::className()]]);
// popup css
$this->registerCssFile("http://www.jacklmoore.com/colorbox/example1/colorbox.css");
// popup js
 //$this->registerJsFile("http://code.jquery.com/jquery-3.2.1.min.js", ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsFile("http://www.jacklmoore.com/colorbox/jquery.colorbox.js", ['depends' => [\yii\web\JqueryAsset::className()]]);
 
?>
<div class="container">
    <div class="site-index">
      <div id="owl-demo" class="owl-carousel owl-theme">
       <div class="item"><?= Html::img('@web/images/1.jpg', ['alt' => 'ทดสอบ']) ?></div>
        <div class="item"><?= Html::img('@web/images/2.jpg', ['alt' => 'ทดสอบ']) ?></div>
        <div class="item"><?= Html::img('@web/images/3.jpg', ['alt' => 'ทดสอบ']) ?></div>
        <div class="item"><?= Html::img('@web/images/4.jpg', ['alt' => 'ทดสอบ']) ?></div>
        <div class="item"><?= Html::img('@web/images/5.jpg', ['alt' => 'ทดสอบ']) ?></div>
        <div class="item"><?= Html::img('@web/images/6.jpg', ['alt' => 'ทดสอบ']) ?></div>
        <div class="item"><?= Html::img('@web/images/7.jpg', ['alt' => 'ทดสอบ']) ?></div>
        <div class="item"><?= Html::img('@web/images/8.jpg', ['alt' => 'ทดสอบ']) ?></div>
        <div class="item"><?= Html::img('@web/images/9.jpg', ['alt' => 'ทดสอบ']) ?></div>
        <div class="item"><?= Html::img('@web/images/10.jpg', ['alt' => 'ทดสอบ']) ?></div>
    </div>
        
         <div class="col-lg-6 col-md-6 col-sm-6">
             <div class="panel-body">
                 <div class="embed-responsive embed-responsive-16by9">
                     <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/RSq66Sr9uac?playlist=RSq66Sr9uac&loop=1"></iframe>
                </div>
            </div>
         </div>
         <div class="col-lg-6 col-md-6 col-sm-6">
             <div class="panel-body">
                 <div class="embed-responsive embed-responsive-16by9">
                     <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/WYh1apXwVu0?playlist=WYh1apXwVu0&loop=1"></iframe>
                </div>
            </div>
         </div>

        <p />
        <div class="row">
            <div class="col-md-9">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-bullhorn fa-flip-horizontal"></i> ข่าวประชาสัมพันธ์</h3>
                    </div>
                    <?php
                    $newspurchase = $this->render('newspurchase', [
                        'newspurchase' => $newspurchase
                    ]);
                    $newswork = $this->render('newswork', [
                        'newswork' => $newswork
                    ]);
                    $newsall = $this->render('newsall', [
                        'dataProvider' => $dataProvider
                    ]);
                    $items = [
                        [
                            'label' => '<i class="glyphicon glyphicon-list"></i> ข่าวจัดซื้อจัดจ้าง',
                            'content' => $newspurchase,
                        ],
                        [
                            'label' => '<i class="glyphicon glyphicon-list"></i> ข่าวทั่วไป',
                            'content' => $newsall,
                        ],
                    ];
                    echo TabsX::widget([
                        'items' => $items,
                        'position' => TabsX::POS_ABOVE,
                        'bordered' => true,
                        'encodeLabels' => false
                    ]);
                    ?>
                </div>
				 <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-bullhorn fa-flip-horizontal"></i>เกี่ยวกับโรงพยาบาล</h3>
                    </div>
                        <div class="panel-body">
                            <div>
                         <ul class="xoxo blogroll">
		<a href="https://www.facebook.com/2059017560848601/photos/p.2059140214169669/2059140214169669/" target="blank"><img src="images/แล่น1.jpg" width="700" height="350" border="0" alt=""></a>
        <a href="http://m30hospital.com/run_m30/index.php" target= "blank">ตรวจสอบรายชื่อผู้สมัครวิ่ง แล่น ม่วน ม่วง</a>  (<b stye="color:red">แล่น ม่วน ม่วง</b>)
                         
			           <ul>
				    
						</ul>
						<br>
						<br><img src="images/พันธกิจ.jpg" width="250" height="60" border="0" alt="" >
							<ul>
							<li><a>1. ให้บริการรักษาพยาบาล ส่งเสริมสุขภาพ ป้องกันโรค และฟื้นฟูสภาพอย่างมีคุณภาพตามมาตรฐานวิชาชีพอย่างดีที่สุด </a></li>
							<li><a>2. สนับสนุน เครือข่ายปฐมภูมิให้บริการที่มีคุณภาพได้มาตรฐาน   </a></li>
							<li><a>3. บริหารจัดการอย่างมีประสิทธิภาพ   </a></li>
							<li><a>4. รับผิดชอบต่อชุมชนและสิ่งแวดล้อม  </a></li>
							<li><a>5. จัดการสารสนเทศ เทคโนโลยีสารสนเทศ ให้ทันสมัยและมีคุณภาพ   </a></li>
							<li><a>6. การจัดการความรู้ขององค์กรอย่างต่อเนื่อง   </a></li>
							<li><a>7. สนับสนุนบุคลากรให้มีความสุขในการทำงานและพัฒนาให้มีสมรรถนะตามมาตรฐาน</a></li>
                            <li><a>8. ดำเนินงานให้สอดคล้องและตอบสนองนโยบายระดับสูง </a></li>
							</ul>
                            </div>
                        </div>
                    </div>
					
                 <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-bullhorn fa-flip-horizontal"></i> อัพเดตโปรแกรม</h3>
                    </div>
                        <div class="panel-body">
                            <div>
                         <ul class="xoxo blogroll">
                         </a>
                        <img src="images/arrow_all.gif" width="10" height="10"><a href="https://www.ha.or.th/TH/News/News/Detail/1162" target="_blank"> 
                          มาตรฐานโรงพยาบาลและบริการสุขภาพ ฉบับที่4 (HA2018)
                          </a>
                        
                          <br><img src="images/arrow_all.gif" width="10" height="10"><a href="https://citizen.info.go.th/" target="_blank"> 
                          ระบบการประเมินความพึงพอใจของประชาชนต่อการให้บริการของหน่วยงานภาครัฐ
                          </a>
                         <br><img src="images/arrow_all.gif" width="10" height="10"><a href="https://drive.google.com/open?id=1i_lOFDLr-e4Z6LPyUDBRhw_fvLQImMlK" target="_blank">
                          โครงสร้างมาตรฐานข้อมูลสุขภาพ (43แฟ้ม) Version 2.3 ปีงบประมาณ 2561 
                           </a>
                         <br> <img src="images/arrow_all.gif" width="10" height="10"><a href="https://drive.google.com/open?id=0B9VVFGgnSeSuTWJuSmsyOTZJQnc" target="_blank">
                          โครงสร้างมาตรฐานข้อมูลสุขภาพ (43แฟ้ม) Version 2.2 ปีงบประมาณ 2560 
                          </a>
                        <br> <img src="images/arrow_all.gif" width="10" height="10"><a href="http://www.nhso.go.th/files/userfiles/file/NHSOAuthen4_2017.rar" target="_blank">
                         โปรแกรม NHSO UCAuthentication 4.0 สำหรับ Authen เข้าระบบเว็บตรวจสอบสิทธิผ่านประชาชน(Smart Card) 
                         </a>
						 <a href="http://m30hospital.com/web/index.php?r=requests%2Fcreate" target="blank"><img src="images/รับแจ้ง.jpg" width="250" height="60" border="0" alt=""></a>
			<ul>
				<li><a href="http://m30hospital.com/web/index.php?r=requests%2Fcreate" target= "blank">แจ้งข้อร้องเรียน</a>  (<b stye="color:red">ส่งตรงเข้าไลน์ผู้บริหารโรงพยาบาล</b>)</li>
				<li><a href="http://m30hospital.com/web/index.php?r=recommend%2Fcreate" target="blank">แจ้งข้อเสนอแนะ</a>  (<b stye="color:red">ส่งตรงเข้าไลน์ผู้บริหารโรงพยาบาล</b>)</li>
			</ul>
            <br>
			<br><a href= "http://m30hospital.com/1425/" target="blank"><img src="images/ธรรมาภิบาล.jpg" width="250" height="60" border="0" alt="" ></a>
                            </div>
                        </div>
                    </div>
					<div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-bullhorn fa-flip-horizontal"></i>การบริการ</h3>
                    </div>
                        <a href="http://m30hospital.com/web/index.php?r=site%2Fdental" target="blank"><img src="images/ทันตกรรม.jpg" width="250" height="80" border="0" alt=""></a>
                         <a href="http://m30hospital.com/web/index.php?r=site%2Fthaimed" target="blank"><img src="images/แผนไทย.jpg" width="250" height="80" border="0" alt=""></a>
						  <a href="http://m30hospital.com/web/index.php?r=site%2Fpcu" target="blank"><img src="images/pcu.jpg" width="300" height="80" border="0" alt=""></a>
						 <br> <a href="http://m30hospital.com/web/index.php?r=site%2Fer" target="blank"><img src="images/er1.jpg" width="250" height="80" border="0" alt=""></a>
						 <a href="http://m30hospital.com/web/index.php?r=site%2Fregister" target="blank"><img src="images/register1.jpg" width="250" height="80" border="0" alt=""></a>
						  <a href="http://m30hospital.com/web/index.php?r=site%2Fclinic" target="blank"><img src="images/คลินิก.jpg" width="250" height="80" border="0" alt=""></a>
						  <br> <a href="http://m30hospital.com/web/index.php?r=site%2Fphisical" target="blank"><img src="images/กายภาพ.jpg" width="250" height="80" border="0" alt=""></a>
						 <a href="http://m30hospital.com/web/index.php?r=site%2Flr" target="blank"><img src="images/คลอด.jpg" width="250" height="80" border="0" alt=""></a>
						  <a href="http://m30hospital.com/web/index.php?r=site%2Fckd" target="blank"><img src="images/ckd.jpg" width="250" height="80" border="0" alt=""></a>
                          <br> <a href="http://m30hospital.com/web/index.php?r=site%2Fpharm" target="blank"><img src="images/ยา.jpg" width="250" height="80" border="0" alt=""></a>
						 <a href="http://m30hospital.com/web/index.php?r=site%2Faids" target="blank"><img src="images/ให้คำปรึกษา.jpg" width="250" height="80" border="0" alt=""></a>
						  <a href="http://m30hospital.com/web/index.php?r=site%2Fholistic" target="blank"><img src="images/ยาเสพติด.jpg" width="250" height="80" border="0" alt=""></a>

                    </div>
                
                <!--<div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-calendar" aria-hidden="true"></i> ตารางปฏิบัติงาน / กิจกรรม</h3>
                    </div>
                    <div class="panel-body">
                        <?php
                        echo \yii2fullcalendar\yii2fullcalendar::widget(array(
                            'id' => 'calendar',
                            'events' => $events,
                            'options' => [
                                'lang' => 'th',
                            ],
                            'clientOptions' => [
                                'eventMouseover' => new \yii\web\JsExpression("function (cellInfo, jsEvent) { eventDetail(cellInfo, jsEvent); }"),
                                'eventMouseout' => new \yii\web\JsExpression("function (cellInfo, jsEvent) { eMouseremove(cellInfo, jsEvent); }")
                            ]
                        ));
                        ?>

                    </div>
                </div>-->
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-picture-o" aria-hidden="true"></i> อัลบั้มภาพ</h3>
                    </div>
                    <div class="panel-body">
                        <?php
                        echo ListView::widget([
                            'dataProvider' => $dataProvider2,
                            'itemView' => '/photo-library/_item',
                            'layout' => '{items}{pager}',
                        ]);
                        ?>
                    </div>
                </div>
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-chain-broken" aria-hidden="true"></i> วิดีโอ</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="panel-body">
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/f9Z0XnYCDHs"></iframe>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="panel-body">
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/bzX0L28u-Yk"></iframe>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="panel-body">
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/5XElfttJuWI"></iframe>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="panel-body">
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/XyU0r2Xo7fk"></iframe> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <!--<div class="panel-group">-->
                    <div class="panel panel-warning">
                        <div class="panel-heading"><h4 class="panel-title"><i class="fa fa-user-md" aria-hidden="true"></i> ผู้บริหาร</h4></div>
                        <div class="panel-body">
                            <div class="thumbnail" align="center">
                                <img src="images/boss0.jpg" alt="...">
                                <div class="caption">
                                    <h4>นพ.ประจักษ์ สีลาชาติ</h4>
                                    <h5>ผู้อำนวยการโรงพยาบาลม่วงสามสิบ</h5>
                                </div>
                            </div>
                            <ul class="xoxo blogroll">
                            </ul>
                        </div>
                    </div>
                    <!--</div>-->
                    <!--</div>-->
                    <!--<div class="col-xs-6 col-md-4">-->
                    <!--<div class="panel-group">-->
    
                    
                            <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fmhosp-
                            117251501692874%2F&tabs=timeline&width=270&height=500&small_header=false&adapt_container_width=true&hide_cover
                            =false&show_facepile=true&appId" width="300" height="500" style="border:none;overflow:hidden" 
                            scrolling="no" frameborder="0" allowTransparency="true"></iframe>

                    <div class="panel panel-warning">
                        <div class="panel-heading"><h4 class="panel-title"><i class="fa fa-h-square" aria-hidden="true"></i> สมุดสุขภาพประชาชน(H4U)</h4></div>
                        <div class="panel-body">
                            <div>
                                <ul class="xoxo blogroll">
                                    <li><a href="https://consent.moph.go.th/" target="_blank">ConsentForm</a></li>
                                    <li><a href="http://192.168.200.9:4200" target="_blank">อนุมัติประวัติบริการ</a></li>
                                    <li><a href="https://drive.google.com/file/d/1qHu7cIuI2n5NYiSmSTVQkg8D1BfVvXtA/view?usp=sharing" target="_blank">ใบแสดงความยินยอม</a></li>
                                    <li><a href="https://ict.moph.go.th/upload_file/files/b636e184c7f932f65124e284156f7284.png" target="_blank">ขั้นตอนการใช้สมุดสุขภาพประชาชน</a></li>
                                </ul>
                            </div>
                        </div>

                    <div class="panel panel-warning">
                        <div class="panel-heading"><h4 class="panel-title"><i class="fa fa-h-square" aria-hidden="true"></i> ระบบในหน่วยงาน(Intranet)</h4></div>
                        <div class="panel-body">
                            <div>
                                <ul class="xoxo blogroll">
                                    <li><a href="http://m30hospital.com/service/frontend/web/index.php" target="_blank">ยืมคืนเวชระเบียน</a></li>
                                    <li><a href="http://192.168.200.4/service/meeting/index.php" target="_blank">จองห้องประชุม(เดิม)</a></li>
                                    <li><a href="http://192.168.200.8/service-support/fullcalendar1_2.php" target="_blank">จองห้องประชุม(ใหม่)</a></li>
                                    <li><a href="http://192.168.200.8/service-support/fullcalendar1_2.php" target="_blank">จองรถยนต์</a></li>
                                    <li><a href="http://192.168.200.4/service/index.php?show=add_job" target="_blank">ส่งซ่อมคอมพิวเตอร์</a></li>
                                    <li><a href="http://192.168.200.4/service/index.php?show=add_job" target="_blank">ส่งสื่อโสตทัศนศึกษา</a></li>
                                </ul>
                            </div>
                        </div>

                       <div class="panel panel-warning">
                        <div class="panel-heading"><h4 class="panel-title"><i class="fa fa-h-square" aria-hidden="true"></i> ระบบรายงานmBase(Intranet)</h4></div>
                        <div class="panel-body">
                            <div>
                                <ul class="xoxo blogroll">
                                    <li><a href="http://192.168.200.8/yii2a-devices/frontend/web/index.php?r=thaimed%2Findex" target="_blank">แพทย์แผนไทย</a></li>
                                    <li><a href="http://192.168.200.8/yii2a-devices/frontend/web/index.php?r=report%2Findex" target="_blank">เวชระเบียน</a></li>
                                    <li><a href="http://192.168.200.8/yii2a-devices/frontend/web/index.php?r=dental%2Findex" target="_blank">ทันตกรรม</a></li>
                                    <li><a href="http://192.168.200.8/yii2a-devices/frontend/web/index.php?r=lr%2Findex" target="_blank">ห้องคลอดANC</a></li>
                                    <li><a href="http://192.168.200.8/yii2a-devices/frontend/web/index.php?r=chronic%2Findex" target="_blank">คลินิกไตเรื้อรัง</a></li>
                                    <li><a href="http://192.168.200.8/yii2a-devices/frontend/web/index.php?r=pharm%2Findex" target="_blank">เภสัชกรรม</a></li>
                                    <li><a href="http://192.168.200.8/yii2a-devices/frontend/web/index.php?r=addictive%2Findex" target="_blank">งานยาเสพติด</a></li>
                                 
                                </ul>
                            </div>
                        </div>         
                    
                    <!--</div>-->
                    <!--</div>-->
                    <!--<div class="col-xs-6 col-md-4">-->
                    <!--<div class="panel-group">-->
                    <div class="panel panel-warning">
                        <div class="panel-heading"><h4 class="panel-title"><i class="fa fa-h-square" aria-hidden="true"></i> โรงพยาบาลชุมชน</h4></div>
                        <div class="panel-body">
                            <div>
                                <ul class="xoxo blogroll">
                                    <li><a href="http://www.kkphospital.go.th" target="_blank">โรงพยาบาลกุดข้าวปุ้น</a></li>
                                    <li><a href="http://www.dmdhospital.com/" target="_blank">โรงพยาบาลดอนมดแดง</a></li>
                                    <li><a href="http://www.trakanhospital.org/" target="_blank">โรงพยาบาลตระการพืชผล</a></li>
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
                                </ul>
                            </div>
                        </div>
                                
                        <div class="panel panel-warning">
                        <div class="panel-heading"><h4 class="panel-title"><i class="fa fa-cogs" aria-hidden="true"></i> ระบบ MIS</h4></div>
                        <div class="panel-body">
                           
                            <a href="http://www.phoubon.in.th/" target="blank"><img src="images/PHOUBON.gif" width="250" height="60" border="0" alt=""></a>
                            <a href="http://203.157.166.6/chronic/index.php" target="_blank"><img src="images/chronic.png" width= "250" height ="60" border= "0"></a>
                            <a href="http://eclaim.nhso.go.th/webComponent/contact/ContactAction.do" target="_blank"><img src="images/claim2.jpg" width= "250" height          ="60" border= "0"></a>
                            <a href="https://ubn.hdc.moph.go.th/hdc/main/index_pk.php" target="_blank"><img src="images/hdc_ubon.jpg" width="250" height="60" border="0"></a></li>
                            <a href="http://eclaim.nhso.go.th/webComponent/" target="_blank"><img src="images/oppp2010.jpg" width="250" height="60" border="0"></a></li>
                            <a href="http://hs.dtam.moph.go.th/" target="_blank"><img src="images/hdc-ttm.jpg" width="250" height="60" border="0"></a>
                            <a href="http://www.coopubon.com/coopubon/info_coop1/coop_login.php" target="_blank"><img src="images/ออมทรัพย์อุบล.jpg" width="250" height="60" border="0"></a>
                            <a href="http://m30.phoubon.in.th" target="_blank"><img src="images/หมอครอบครัว.jpg" width="250" height="60" border="0"></a>
							<a href="http://auditor.ops.moph.go.th/" target="balnk"><img src="images/moph2_56020d952e52d_2015-09-23 (1).jpg" width="250" height="60" border="0" alt=""></a>
							<a href="http://www.pacc.go.th/index.php/greeting" target ="blank"><img src="images/ppt_55fe730d694c9_2015-09-20 (1).jpg" width="250" height="70" border="0" alt=""></a>
							<a href="http://discipline.ops.moph.go.th/" target="blank"><img src="images/vinai_55fe740389a94_2015-09-20 (1).jpg" width="250" height="60" border="0" alt=""></a>
							<a href="http://www.legal.moph.go.th/" target="blank"><img src="images/law_56021a39a45d9_2015-09-23 (1).jpg" width="250" height="60" border="0" alt=""></a>
        
                        </div>
                    </div>

                      </div>
                    </div>
                    <!--</div>-->
                </div>
            </div>
        </div>
    </div
</div>
</div>
<?php
$this->registerJsFile('@web/js/main.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
?>
