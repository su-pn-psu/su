<?php

use yii\helpers\Html;
use yii\helpers\BaseStringHelper;
//use firdows\menu\models\Navigate;
use suPnPsu\material\components\Navigate;

?>

<div class="row">
    
    <!-- /.col -->
    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
        <?= $content ?>
        <!-- /. box -->
    </div>
    <!-- /.col -->
    
    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
        <?=$this->render('_login')?>
    </div>
</div>


