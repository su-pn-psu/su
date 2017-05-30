<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

$this->title = Yii::t('app', 'ลงชื่อเข้าใช้');
$this->params['breadcrumbs'][] = $this->title;
?>

<section class="no-mb">

    <div class="jumbotron">

        <div class="dark-mask"></div>

        <div class="container">
<!--            <div class="row mb-small">
                <div class="col-sm-12 text-center">
                    <h1>ยินดีต้อนรับเข้าสู่</h1> 
                    <h2>ระบบการจัดการภายในองค์การนักศึกษาเพื่อนักศึกษาของม.อ.ปัตตานี</h2>
                </div>
            </div>-->

            <div class="row">
                <div class="col-sm-8 mb-small">
                    <img class="img-responsive" src="<?= \yii\helpers\Url::to('@themes/img/login.png') ?>" alt="" width="100%">
                </div>

                <div class="col-sm-4 text-center-xs">


                    <div class="row">
                        <div class="col-sm-12 well bs-component">
                            <div class="login-box">
                                <div class="login-logo">
                                    <div class="row">
                                        <div class="col-xs-4 col-sm-4 ">
                                            <?= Html::img(Url::base() . "/uploads/psupassport.png", ['width' => '100%']) ?>
                                        </div>
                                        <div class="col-xs-8 col-sm-8">
                                            <?= Html::tag('h4', Yii::t('app', 'ลงชื่อผู้เข้าด้วย PSU Passport'), ['class' => 'login-box-msg text-top', 'style' => 'padding:0px 0px 15px;']) ?>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.login-logo -->
                                <div class="login-box-body">

                                    <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                                    <?=
                                    $form->field($model, 'username', [
                                        'inputTemplate' => '{input}<span class="glyphicon glyphicon-user form-control-feedback"></span>',
                                        'options' => [
                                            'class' => 'form-group has-feedback'
                                        ],
                                    ])->textInput(['autofocus' => true, 'placeholder' => 'รหัสนักศึกษา'])->label(false)
                                    ?>

                                    <?=
                                    $form->field($model, 'password', [
                                        'inputTemplate' => '{input}<span class="glyphicon glyphicon-lock form-control-feedback"></span>',
                                        'options' => [
                                            'class' => 'form-group has-feedback'
                                        ],
                                    ])->passwordInput(['placeholder' => 'รหัสผ่าน'])->label(false)
                                    ?>


                                    <div class="row">
                                        <div class="col-xs-6">
                                            <?= $form->field($model, 'rememberMe')->checkbox()->label('จำฉันไว้ในระบบ') ?>
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-xs-6">
                                            <?= Html::submitButton('<i class="fa fa-sign-in"></i> Log in', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
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

                </div>
            </div>
        </div>
    </div>
    
</section>