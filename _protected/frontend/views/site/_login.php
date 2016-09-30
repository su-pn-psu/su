<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use suPnPsu\user\models\LoginForm;


$model = new LoginForm();
?>

<div class="row">
    <div class="col-sm-12 bs-component">
        <div class="login-box">
            <div class="login-logo">
                <div class="row">
                    <div class="col-xs-4 col-sm-4 ">
                        <?=Html::img(Url::base() . "/uploads/psupassport.png", ['width' => '100%'])?>
                    </div>
                    <div class="col-xs-8 col-sm-8">
                        <?= Html::tag('h4', Yii::t('app', 'ลงชื่อผู้เข้าด้วย PSU Passport'), ['class' => 'login-box-msg text-top', 'style' => 'padding:0px 0px 15px;']) ?>
                    </div>
                </div>
            </div>
            <!-- /.login-logo -->
            <div class="login-box-body">

                <p class="login-box-msg">Sign in to start your session</p>

                <?php $form = ActiveForm::begin(['id' => 'login-form','action'=>['/site/login']]); ?>

                <?=
                $form->field($model, 'username', [
                    'inputTemplate' => '{input}<span class="glyphicon glyphicon-user form-control-feedback"></span>',
                    'options' => [
                        'class' => 'form-group has-feedback'
                    ],
                ])->textInput(['autofocus' => true, 'placeholder' => $model->getAttributeLabel('username')])->label(false)
                ?>

                <?=
                $form->field($model, 'password', [
                    'inputTemplate' => '{input}<span class="glyphicon glyphicon-lock form-control-feedback"></span>',
                    'options' => [
                        'class' => 'form-group has-feedback'
                    ],
                ])->passwordInput(['placeholder' => $model->getAttributeLabel('password')])->label(false)
                ?>


                <div class="row">
                    <div class="col-xs-8">
                        <?= $form->field($model, 'rememberMe')->checkbox() ?>
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <?= Html::submitButton('Login', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
                    </div>
                    <!-- /.col -->
                </div>                

                <?php ActiveForm::end(); ?>
                <a href="<?= Url::to(['site/signup']); ?>" class="text-center">ลงทะเบียนเข้าใช้ใหม่</a>

            </div>
            <!-- /.login-box-body -->
        </div>
    </div>
</div>