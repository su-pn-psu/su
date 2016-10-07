<?php
/* @var $this yii\web\View */

//use Yii;
//$this->title = Yii::t('app', Yii::$app->name);
//echo Yii::getAlias('@uploads');

use yii\helpers\Url;

$this->title = Yii::$app->name;
?>

<?php if (Yii::$app->user->isGuest): ?>
    <section class="no-mb">

        <div class="jumbotron">

            <div class="dark-mask"></div>

            <div class="container">
                <div class="row mb-small">
                    <div class="col-sm-12 text-center">
                        <h1>ยินดีต้อนรับเข้าสู่</h1> 
                        <h2>ระบบการจัดการภายในองค์การนักศึกษาเพื่อนักศึกษาของม.อ.ปัตตานี</h2>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-8 mb-small">
                        <img class="img-responsive" src="<?= \yii\helpers\Url::to('@themes/img/index.png') ?>" alt="" width="100%">
                    </div>

                    <div class="col-sm-4 text-center-xs">
    <?= $this->render('_login'); ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- *** JUMBOTRON END *** -->
    </section>


    <section class="bar background-gray no-mb padding-big text-center-sm"> 

        <div class="row">
            <div class="col-md-4">
                <div class="box-simple">
                    <div class="icon">
                        <i class="fa fa-map-marker"></i>
                    </div>
                    <h3>ระบบยืมคืนพัสดุ</h3>
                    <p>13/25 New Avenue
                        <br>New Heaven, 45Y 73J
                        <br>England, <strong>Great Britain</strong>
                    </p>
                </div>
                <!-- /.box-simple -->
            </div>


            <div class="col-md-4">

                <div class="box-simple">
                    <div class="icon">
                        <i class="fa fa-phone"></i>
                    </div>
                    <h3>ระบบขอใช้ห้อง</h3>
                    <p class="text-muted">This number is toll free if calling from Great Britain otherwise we advise you to use the electronic form of communication.</p>
                    <p><strong>+33 555 444 333</strong>
                    </p>
                </div>
                <!-- /.box-simple -->

            </div>

            <div class="col-md-4">

                <div class="box-simple">
                    <div class="icon">
                        <i class="fa fa-envelope"></i>
                    </div>
                    <h3>ระบบขอใช้รถ</h3>
                    <p class="text-muted">Please feel free to write an email to us or to use our electronic ticketing system.</p>
                    <ul class="list-style-none">
                        <li><strong><a href="mailto:">info@fakeemail.com</a></strong>
                        </li>
                        <li><strong><a href="#">Ticketio</a></strong> - our ticketing support platform</li>
                    </ul>
                </div>
                <!-- /.box-simple -->
            </div>
        </div>

    </section>


<?php
else:
    $user = Yii::$app->user->identity->profile->resultInfo;
    ?>
    <section class="bar background-gray no-mb padding-big text-center-sm"> 

        <div class="row">
            <div class="col-md-12">
                <div class="box-simple">

                    <h2>ยินดีต้อนรับ</h2>
                    <p><?= $user->fullname ?></p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="box-simple">
                    <div class="icon">
                        <i class="fa fa-map-marker"></i>
                    </div>
                    <h3>ระบบยืมคืนพัสดุ</h3>
                    <p>13/25 New Avenue
                        <br>New Heaven, 45Y 73J
                        <br>England, <strong>Great Britain</strong>
                    </p>
                </div>
                <!-- /.box-simple -->
            </div>


            <div class="col-md-4">

                <div class="box-simple">
                    <div class="icon">
                        <i class="fa fa-phone"></i>
                    </div>
                    <h3>ระบบขอใช้ห้อง</h3>
                    <p class="text-muted">This number is toll free if calling from Great Britain otherwise we advise you to use the electronic form of communication.</p>
                    <p><strong>+33 555 444 333</strong>
                    </p>
                </div>
                <!-- /.box-simple -->

            </div>

            <div class="col-md-4">

                <div class="box-simple">
                    <div class="icon">
                        <i class="fa fa-envelope"></i>
                    </div>
                    <h3>ระบบขอใช้รถ</h3>
                    <p class="text-muted">Please feel free to write an email to us or to use our electronic ticketing system.</p>
                    <ul class="list-style-none">
                        <li><strong><a href="mailto:">info@fakeemail.com</a></strong>
                        </li>
                        <li><strong><a href="#">Ticketio</a></strong> - our ticketing support platform</li>
                    </ul>
                </div>
                <!-- /.box-simple -->
            </div>
        </div>

    </section>
<?php endif; ?>

<?=Yii::$app->runAction('/reserve-room/default/present')?>