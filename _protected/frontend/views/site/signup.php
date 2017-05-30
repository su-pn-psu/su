<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

$this->title = Yii::t('app', 'ลงทะเบียน');
$this->params['breadcrumbs'][] = $this->title;
$this->params['bodyClass'] = 'hold-transition register-page';
?>
<?php
//echo $this->context->module->userUploadDir;
?>
<div class="row">
    <div class="col-sm-4 col-sm-offset-4">
        <div class="register-box">
            <div class="register-logo">
                <b><?= $this->title ?></b>
            </div>

            <div class="register-box-body">
                <p class="login-box-msg">Register a new membership</p>
                <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?=
                $form->field($model, 'username', [
                    'inputTemplate' => '{input}<span class="glyphicon glyphicon-user form-control-feedback"></span>',
                    'options' => [
                        'class' => 'form-group has-feedback'
                    ],
                ])->textInput(['autofocus' => true, 'placeholder' => Yii::t('app', 'รหัสนักศึกษา')])->label(false);
                ?>



                <?=
                $form->field($model, 'password', [
                    'inputTemplate' => '{input}<span class="glyphicon glyphicon-lock form-control-feedback"></span>',
                    'options' => [
                        'class' => 'form-group has-feedback'
                    ],
                ])->passwordInput(['placeholder' => $model->getAttributeLabel('password')])->label(false);
                ?>

                <?=
                $form->field($model, 'email', [
                    'inputTemplate' => '{input}<span class="glyphicon glyphicon-envelope form-control-feedback"></span>',
                    'options' => [
                        'class' => 'form-group has-feedback'
                    ],
                ])->textInput(['placeholder' => $model->getAttributeLabel('email')])->label(false);
                ?>


                <div class="row">
                    <div class="col-xs-8">
                        <?= $form->field($model, 'acceptLicence')->checkbox() ?>
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <?= Html::submitButton('ลงทะเบียน', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'register-button']) ?>
                    </div>
                    <!-- /.col -->
                </div>



                <?php ActiveForm::end(); ?>


            </div>
            <!-- /.form-box -->
        </div>
    </div>
</div>