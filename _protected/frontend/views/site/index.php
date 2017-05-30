<?php
/* @var $this yii\web\View */

//use Yii;
//$this->title = Yii::t('app', Yii::$app->name);
//echo Yii::getAlias('@uploads');

use yii\helpers\Url;
use yii\helpers\Html;

$this->title = Yii::$app->name;
?>

<?php if (Yii::$app->user->isGuest): ?>
    <section>
        <!-- *** HOMEPAGE CAROUSEL ***
    _________________________________________________________ -->

        <div class="home-carousel">

            <div class="dark-mask"></div>

            <div class="container">
                <div class="homepage owl-carousel">
                    <div class="item">

                        <div class="row">
                            <div class="col-sm-12">
                                <img class="img-responsive" src="<?= \yii\helpers\Url::to('@themes/img/index.png') ?>" alt="" width="100%">
                            </div>
                            <div class="col-sm-12 text-center">
                                <br />
                                <br />

                                <?= Html::a('<i class="fa fa-sign-in"></i> ลงชื่อเข้าใช้', ['/site/login'], ['class' => 'btn btn-primary btn-lg']) ?>
                                <?= Html::a('<i class="fa fa-user-plus"></i> ลงทะเบียน', ['/site/signup'], ['class' => 'btn btn-link btn-lg', 'style' => 'color:#fff;']) ?>



                            </div>
                        </div>
                    </div>

                    <div class="item"> <img  src="<?= \yii\helpers\Url::to('@themes/img/slide/slide1.png', true) ?>" /></div>
                    <div class="item"> <img  src="<?= \yii\helpers\Url::to('@themes/img/slide/slide2.png', true) ?>" /></div>
                    <div class="item"> <img  src="<?= \yii\helpers\Url::to('@themes/img/slide/slide3.png', true) ?>" /></div>
                    <div class="item"> <img  src="<?= \yii\helpers\Url::to('@themes/img/slide/slide4.png', true) ?>" /></div>
                    <div class="item"> <img  src="<?= \yii\helpers\Url::to('@themes/img/slide/slide5.png', true) ?>" /></div>



                </div>
                <!-- /.project owl-slider -->
            </div>
        </div>

        <!-- *** HOMEPAGE CAROUSEL END *** -->
    </section>






    <?php
else:
    $user = Yii::$app->user->identity->profile->resultInfo;
    ?>
    <section class="no-mb">

        <div class="jumbotron">

            <div class="dark-mask"></div>

            <div class="container">


                <div class="row">
                    <div class="col-sm-8">
                        <img class="img-responsive" src="<?= \yii\helpers\Url::to('@themes/img/login.png') ?>" alt="" width="100%">
                    </div>

                    <div class="col-sm-4  well">  
                        <div class="heading text-center">
                            <h3 style="color: #444;">ยินดีต้อนรับคุณ</h3>
                        </div>

                        <div class="row">
                            <div class="col-sm-3 col-sm-offset-1">
                                <div class="avatar">
                                    <img alt="" src="<?= $user->avatar ?>">
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="name-picture">
                                    <h5><?= $user->fullname ?></h5>
                                    <p><?= implode(', ', [$user->major, $user->faculty]); ?></p>

                                    <a href="<?= Url::to(['/account']) ?>">
                                        <i class="fa fa-user"></i> แก้ไขประวัติ
                                    </a> 


                                </div>                
                            </div>                
                        </div>  
                        <hr />
                        <div class="row">
                            <div class="col-sm-8 col-sm-offset-4">                               
                                <a href="<?= Url::to(['/site/logout']) ?>" data-method='post' class="btn btn-warning">
                                    <i class="fa fa-sign-out"></i>
                                    <span class="hidden-xs text-uppercase"> ออกจากระบบ</span>
                                </a>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>


<section class="bar background-white no-mb padding-big text-center-sm"> 

    <div class="row">
        <div class="col-md-4">
            <div class="box-simple">
                <div class="icon">
                    <i class="fa fa-cube"></i>
                </div>
                <h3>ระบบยืมคืนพัสดุ</h3>
                <p> สำหรับการยืมคืน อุปกรณ์ต่างๆที่ทางองค์กรอนุญาต 
                    <br>ตัวอย่าง เช่น ลำโพง, ไมโครโฟน, วิทยุสื่อสาร เป็นต้น                        
                </p>
                <div class="text-center">
                    <?= Html::a('ขอยืมพัสุด', ['/borrow-material/default'], ['class' => 'btn btn-primary']) ?>
                </div>
            </div>
            <!-- /.box-simple -->
        </div>


        <div class="col-md-4">

            <div class="box-simple">
                <div class="icon">
                    <i class="fa fa-building"></i>
                </div>
                <h3>ระบบขอใช้ห้อง</h3>
                <p class="text-muted">ระบบยืมใช้ห้องประชุม สำหรับการขอใช้ ห้องประชุม</p>
                <div class="text-center">
                    <?= Html::a('ขอใช้ห้อง', ['/reserve-room/default/create'], ['class' => 'btn btn-primary']) ?>
                </div>
            </div>
            <!-- /.box-simple -->

        </div>

        <div class="col-md-4">

            <div class="box-simple">
                <div class="icon">
                    <i class="fa fa-motorcycle"></i>
                </div>
                <h3>ระบบขอใช้รถ</h3>
                <p class="text-muted">ระบบยืมคืนรถจักรยานยนต์(สามล้อ) สำหรับการขอใช้งาน จักรยานยนต์สามล้อ</p>

                <div class="text-center">
                    <?= Html::a('ขอยืมรถจักรยานยนต์', ['/borrow-vehicle/default'], ['class' => 'btn btn-primary']) ?>
                </div>
            </div>
            <!-- /.box-simple -->
        </div>
    </div>

</section>

<?=
Yii::$app->runAction('/reserve-room/default/present')?>