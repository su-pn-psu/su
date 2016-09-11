<?php

use yii\helpers\Url;
?>

<div id="top">
    <div class="container">
        <div class="row">

            <?php if (Yii::$app->user->isGuest): ?>
                <div class="col-xs-7 contact">
<!--                    <p class="hidden-sm hidden-xs">Contact us on +420 777 555 333 or hello@universal.com.</p>
                    <p class="hidden-md hidden-lg"><a href="#" data-animate-hover="pulse"><i class="fa fa-phone"></i></a>  <a href="#" data-animate-hover="pulse"><i class="fa fa-envelope"></i></a>
                    </p>-->
                </div>
                <div class="col-xs-5 text-right">


                    <div class="login text-right">
                        <a href="#" data-toggle="modal" data-target="#login-modal"><i class="fa fa-sign-in"></i> <span class="hidden-xs text-uppercase">Sign in</span></a>
                        <a href="<?=Url::to(['/user/regist/signup'])?>"><i class="fa fa-user"></i> <span class="hidden-xs text-uppercase">Sign up</span></a>
                    </div>

                </div>

                <?php
            elseif (!Yii::$app->user->isGuest):
                $user = Yii::$app->user->identity;
                $user = ($user->profile) ? $user->profile->resultInfo : $user;
                ?>
                <div class="col-xs-7 contact">
                    <p class="hidden-sm hidden-xs">
                        <img src="<?= $user->avatar ?>" height="20" class="img-circle"/>&nbsp; <?= $user->fullname ?></p>
                    <p class="hidden-md hidden-lg"><a href="#" data-animate-hover="pulse"><i class="fa fa-phone"></i></a>  <a href="#" data-animate-hover="pulse"><i class="fa fa-envelope"></i></a>
                    </p>
                </div>
                <div class="col-xs-5 text-right">
                    <div class="login text-right">
                        <a href="<?= Url::to(['/site/logout']) ?>" data-method='post'><i class="fa fa-user"></i> <span class="hidden-xs text-uppercase">ออกจากระบบ</span></a>

                    </div>
                </div>

            <?php endif; ?>
        </div>
    </div>
</div>


