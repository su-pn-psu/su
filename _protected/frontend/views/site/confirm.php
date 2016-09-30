<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

$this->title = Yii::t('app', 'ยืนยันการลงทะเบียน');
$this->params['breadcrumbs'][] = $this->title;


/* @var $this yii\web\View */
/* @var $user suPnPsu\user\models\User */
/* @var $form yii\widgets\ActiveForm */
//print_r($person);
//exit();
?>
<div class="box box-info">
    <?php if(!$saved):?>
    <!-- form start -->
    <?php $form = ActiveForm::begin(); ?>
    <div class="box-body">
        <div class="row">
            <div class="col-xs-2 col-sm-3">
                <img src="<?= $user->profile->resultInfo->avatar ?>" width="100%" class="img-thumbnail" />
            </div>


            <div class="col-xs-10 col-sm-9">
                <h3>บัญชีผู้ใช้</h3>

                <div class="row">
                <div class="form-group col-sm-4">
                    <label class="control-label" >ชื่อผู้ใช้</label>
                    <?= Html::tag('p', $user->username); ?>
                </div>

                <div class="form-group col-sm-4">
                    <label class="control-label" >อีเมลล์</label>
                    <?= Html::tag('p', $user->email); ?>
                </div>
                </div>
                
                
                
                <h3>โปรไฟล์</h3>

                <div class="row">
                    <div class="col-sm-6">
                        <?= $form->field($profile, 'firstname')->textInput(['maxlength' => true,'readonly'=>true]) ?>
                    </div>
                    <div class="col-sm-6">
                        <?= $form->field($profile, 'lastname')->textInput(['maxlength' => true,'readonly'=>true]) ?>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-sm-6">
                        <?= $form->field($person, 'faculty')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-sm-6">
                        <?= $form->field($person, 'major')->textInput(['maxlength' => true]) ?>
                    </div>
                </div>


                <?= $form->field($person, 'tel')->textInput(['maxlength' => true]) ?>

                <?= $form->field($person, 'address')->textarea() ?>
            </div>
        </div>
    </div>
    <!-- /.box-body -->
    <div class="box-footer ">
        <?= Html::submitButton('<i class="fa fa-save" ></i> บันทึก', ['class' => 'btn btn-xl btn-success btn-flat pull-right']) ?>
    </div>
    <!-- /.box-footer -->
    <?php ActiveForm::end(); ?>
    <?php else:?>
    
    <div class="alert alert-success" role="alert"> <i class="fa fa-check" ></i> ข้อมูลของได้ถูกบันทึกเรียบร้อยแล้ว</div>
    <p class="text-muted"> * โปรดรอการอนุมัตจากเจ้าหน้าที่องค์การนักศึกษา</p>
    <p class="text-center">
        <?=Html::a('<i class="fa fa-arrow-left"></i> กลับไปหน้าลงทะเบียน',['/site/signup'],['class'=>'btn btn-default'])?>  
        <?=Html::a('เข้าสู่ระบบ',['/site/login'],['class'=>'btn btn-link'])?>
    </p>
    
    
    
    <?php endif;?>
</div>
