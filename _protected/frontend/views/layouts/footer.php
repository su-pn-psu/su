<?php

use yii\helpers\Url;
use kartik\social\FacebookPlugin;

?>

 <!-- *** FOOTER ***
            
    _________________________________________________________ -->
    

            <footer id="footer" class="hidden-print">
                <div class="container">
                    <div class="col-md-2 col-sm-6">
                        <h4>เกี่ยวกับเรา</h4>

                        <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>

                        <hr>

                        <h4>ร่วมเป็นส่วนหนึ่งกับเรา</h4>

<!--                        <form>
                            <div class="input-group">

                                <input type="text" class="form-control">

                                <span class="input-group-btn">

                                    <button class="btn btn-default" type="button"><i class="fa fa-send"></i></button>

                                </span>

                            </div>
                             /input-group 
                        </form>-->

                        <hr class="hidden-md hidden-lg hidden-sm">

                    </div>
                    <!-- /.col-md-3 -->

<!--                    <div class="col-md-3 col-sm-6">

                        <h4>Blog</h4>

                        <div class="blog-entries">
                            <div class="item same-height-row clearfix">
                                <div class="image same-height-always">
                                    <a href="#">
                                        <img class="img-responsive" src="<?= $path ?>/img/detailsquare.jpg" alt="">
                                    </a>
                                </div>
                                <div class="name same-height-always">
                                    <h5><a href="#">Blog post name</a></h5>
                                </div>
                            </div>

                            <div class="item same-height-row clearfix">
                                <div class="image same-height-always">
                                    <a href="#">
                                        <img class="img-responsive" src="<?= $path ?>/img/detailsquare.jpg" alt="">
                                    </a>
                                </div>
                                <div class="name same-height-always">
                                    <h5><a href="#">Blog post name</a></h5>
                                </div>
                            </div>

                            <div class="item same-height-row clearfix">
                                <div class="image same-height-always">
                                    <a href="#">
                                        <img class="img-responsive" src="<?= $path ?>/img/detailsquare.jpg" alt="">
                                    </a>
                                </div>
                                <div class="name same-height-always">
                                    <h5><a href="#">Very very long blog post name</a></h5>
                                </div>
                            </div>
                        </div>

                        <hr class="hidden-md hidden-lg">

                    </div>-->
                    <!-- /.col-md-3 -->

                    <div class="col-md-3 col-sm-6">

                        <h4>ติดต่อเรา</h4>

                        <p><strong>องค์การบริหาร องค์การนักศึกษา</strong>
                            <br>มหาวิทยาลัยสงขลานครินทร์
                            <br>วิทยาเขตปัตตานี
                            <br>181 ถนนเจริญประดิษฐ์
                            <br>ตำบลรูสะมิแล
                            <br>อำเภอเมือง
                            <br>
                            <strong>ปัตตานี</strong>
                        </p>

                        <a href="<?=Url::to(['/site/contact'])?>" class="btn btn-small btn-template-main">ไปที่หน้าติดต่อเรา</a>

                        <hr class="hidden-md hidden-lg hidden-sm">

                    </div>
                    <!-- /.col-md-3 -->



                    <div class="col-md-3 col-sm-6">
                        <?=$this->render('_user_all');?>
                        
                        <hr class="hidden-md hidden-lg hidden-sm">
                    </div>
                    
                    <div class="col-md-4 col-sm-6">
                        <?php       
echo FacebookPlugin::widget(['type'=>FacebookPlugin::PAGE, 'settings' => ['href'=>'http://facebook.com/su.pn.psu/']]);
                        ?>
                    </div>
                    
                    
                    <!-- /.col-md-3 -->
                </div>
                <!-- /.container -->
            </footer>
            <!-- /#footer -->

            <!-- *** FOOTER END *** -->

            <!-- *** COPYRIGHT ***
    _________________________________________________________ -->

            <div id="copyright" class="hidden-print">
                <div class="container">
                    <div class="col-md-12">
                        <p class="pull-left">&copy; 2016. Andatech / Stedent Union</p>
                        <p class="pull-right">Template by <a href="http://bootstrapious.com">Bootstrapious</a> 
                            <!-- Not removing these links is part of the licence conditions of the template. Thanks for understanding :) -->
                        </p>

                    </div>
                </div>
            </div>
            <!-- /#copyright -->

            <!-- *** COPYRIGHT END *** -->
