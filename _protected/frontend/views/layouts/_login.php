<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$model = new common\models\LoginForm;
?>

<div class="box">


    <?php
    echo Yii::$app->runAction('/site/profile');
    ?>
    
</div>

<div class="panel panel-default sidebar-menu">

    <div class="panel-heading">
        <h3 class="panel-title">Customer section</h3>
    </div>

    <div class="panel-body">

        <ul class="nav nav-pills nav-stacked">
            <li class="active">
                <a href="customer-orders.html"><i class="fa fa-list"></i> My orders</a>
            </li>
            <li>
                <a href="customer-wishlist.html"><i class="fa fa-heart"></i> My wishlist</a>
            </li>
            <li>
                <a href="customer-account.html"><i class="fa fa-user"></i> My account</a>
            </li>
            <li>
                <a href="index.html"><i class="fa fa-sign-out"></i> Logout</a>
            </li>
        </ul>
    </div>

</div>


