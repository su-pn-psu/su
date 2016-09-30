<?php

use yii\helpers\Url;
use yii\helpers\Html;
?>

<div id="top">
    <div class="container">
        <div class="row">

            <?php if (Yii::$app->user->isGuest): ?>
                <div class="col-xs-7 contact">
                    <p class="hidden-sm hidden-xs">Ex.ติดต่องานพัฒนาโองการนักศึกษา 02-123-5678</p>
                    <p class="hidden-md hidden-lg"><a href="#" data-animate-hover="pulse"><i class="fa fa-phone"></i></a>  <a href="#" data-animate-hover="pulse"><i class="fa fa-envelope"></i></a>
                    </p>
                </div>
                <div class="col-xs-5">
                    <div class="login pull-right">                        
                        <a href="<?= Url::to(['/backend']) ?>"><i class="fa fa-users"></i> <span class="hidden-xs text-uppercase"><?= Yii::t('app', 'สำหรับเจ้าหน้าที่') ?></span></a>
                        <a href="<?= Url::to(['/site/signup']) ?>"><i class="fa fa-user"></i> <span class="hidden-xs text-uppercase"><?= Yii::t('app', 'ลงทะเบียน') ?></span></a>
                        <a href="<?= Url::to(['/site/login']) ?>"><i class="fa fa-sign-in"></i> <span class="hidden-xs text-uppercase"><?= Yii::t('app', 'ลงชื่อเข้าใช้') ?></span></a>
                    </div>
                </div>

                <?php
            elseif (!Yii::$app->user->isGuest):
                $user = Yii::$app->user->identity;
                $user = ($user->profile) ? $user->profile->resultInfo : $user;
                ?>
                <div class="col-xs-7 contact">
                    <p class="" ><img src="<?= Url::to([$user->avatar]) ?>" height="20" class="img-circle"/>&nbsp;&nbsp;
                        <a href="<?=Url::to(['/user'])?>" style="color: #fff;"><span><?=$user->fullname?></span></a>
                    </p>
                    
                </div>
                <div class="col-xs-5">
                    <div class="login pull-right">
                        <a href="<?= Url::to(['/backend']) ?>"><i class="fa fa-users"></i><span class="hidden-xs text-uppercase"> <?= Yii::t('app', 'สำหรับเจ้าหน้าที่') ?></span></a>
                        <a href="<?= Url::to(['/site/logout']) ?>" data-method='post'><i class="fa fa-sign-out"></i><span class="hidden-xs text-uppercase"> ออกจากระบบ</span></a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>


