<?php

use yii\bootstrap\Html;
use yii\bootstrap\ActiveForm;
/*
use kartik\widgets\FileInput;
use kartik\widgets\ActiveForm;
use kartik\widgets\DatePicker;
*/
/* @var $this yii\web\View */
/* @var $model backend\modules\borrowreturn\models\Booking */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="booking-form">

    <?php $form = ActiveForm::begin([
			'layout' => 'horizontal', 
			'id' => 'booking-form',
			//'validateOnChange' => true,
            //'enableAjaxValidation' => true,
			//	'enctype' => 'multipart/form-data'
			]); ?>

    <?= $form->field($model, 'entry_status')->textInput() ?>

	<div class="form-group">
		<div class="col-md-6 col-md-offset-6">
    	<?= $form->field($model, 'booking_at',[
            'horizontalCssClasses' => [
                'label' =>'col-md-3',
                'wrapper' => 'col-md-9',
            ]
        ])->textInput() ?>
		</div>
	</div>
    <div class="form-group">
        <div class="col-md-10 col-md-offset-2">
    <?php
        echo \Yii::$app->user->id;
    ?>
        </div>
    </div>
    <?php //= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'belongto_id')->textInput() ?>

    <?= $form->field($model, 'position_id')->textInput() ?>

    <?= $form->field($model, 'purpose')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'isin_university')->textInput() ?>

    <?= $form->field($model, 'university_place')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'acquire_at')->textInput() ?>

    <?= $form->field($model, 'return_at')->textInput() ?>

<?php 		/* adzpire form tips
		$form->field($model, 'wu_tel', ['enableAjaxValidation' => true])->textInput(['maxlength' => true]);
		//file field
				echo $form->field($model, 'file',[
		'addon' => [
       
'append' => !empty($model->wt_image) ? [
			'content'=> Html::a( Html::icon('download').' '.Yii::t('kpi/app', 'download'), Url::to('@backend/web/'.$model->wt_image), ['class' => 'btn btn-success', 'target' => '_blank']), 'asButton'=>true] : false
    ]])->widget(FileInput::classname(), [
			//'options' => ['accept' => 'image/*'],
			'pluginOptions' => [
				'showPreview' => false,
				'showCaption' => true,
				'showRemove' => true,
				'initialCaption'=> $model->isNewRecord ? '' : $model->wt_image,
				'showUpload' => false
			]
]);
		*/
 ?>     <div class="form-group text-center">
        <?= Html::submitButton($model->isNewRecord ?  Html::icon('floppy-disk').' '.Yii::t('borrowreturn/app', 'Save') :  Html::icon('floppy-disk').' '.Yii::t('borrowreturn/app', 'Save'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		<?php if(!$model->isNewRecord){
		 echo Html::resetButton( Html::icon('refresh').' '.Yii::t('borrowreturn/app', 'Reset') , ['class' => 'btn btn-warning']); 
		 } ?>
		 
	</div>

    <?php ActiveForm::end(); ?>

</div>
