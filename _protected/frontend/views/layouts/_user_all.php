<?php

use yii\helpers\Html;
use yii\helpers\Url;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use suPnPsu\user\models\User;

$users = User::find()->where(['LIKE','username','5'])
        ->andWhere(['status'=>10])
        ->limit(6)->all();
?>

<h4>ผู้ใช้ระบบ</h4>

<div class="photostream">

    <?php foreach ($users as $model): ?>
        <div style="width:84px;max-height: 84px;overflow: hidden; ">
            <a href="<?= Url::to(['user', 'id' => $model->id]) ?>">
                <img src="<?= $model->profile->resultInfo->avatar ?>" class="img-responsive" alt="#" width="100%">
            </a>
        </div>
    <?php endforeach; ?>

</div>
<p>
    <?= Html::a('ผู้เข้าใช้ระบบทั้งหมด', ['#'],['class'=>'btn btn-link']) ?>
</p>