<?php

use yii\helpers\Url;
use yii\helpers\Html;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (Yii::$app->user->can('staff')):
    ?>

    <!-- User Account: style can be found in dropdown.less -->
    <li class="dropdown notifications-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-building"></i>

            <?php
            $searchModel = new \suPnPsu\reserveRoom\models\RoomReserveStaffIndexSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            $requestCount = $dataProvider->getCount();

            if ($requestCount):
                ?>
                <span class="label label-warning">
                    <?= $requestCount ?>
                </span>
            <?php endif; ?>
        </a>

        <ul class="dropdown-menu">
            <?php if ($requestCount): ?>
                <li class="header">มีรายการทั้งหมด <?= $requestCount ?> รายการ</li>
                    <?php endif; ?>
            <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">

                    <?php
                    // print_r(Yii::$app->notification->view());

                    foreach ($dataProvider->getModels() as $model):
                        $profile = $model->user->profile->resultInfo;
                        ?>
                        <li>
                            <a href="<?= Url::to(['/reserve-room/staff/consider', 'id' => $model->id]) ?>">
                                <?php
                                $str = Html::beginTag('div', ['class' => 'user-circle'])
                                        . Html::beginTag('div', ['class' => 'circle', 'style' => ''])
                                        . Html::img($profile->avatar, ['class' => '', 'style' => ''])
                                        . Html::endTag('div')
                                        . Html::beginTag('span', ['class' => 'username', 'style' => ''])
                                        . Html::tag('b', $profile->fullname)
                                        . Html::endTag('span')
                                        . Html::beginTag('span', ['class' => '', 'style' => 'display: block;margin-left: 50px;'])
                                        . 'ขอใช้ห้อง'
                                        . Html::endTag('span')
                                        . Html::beginTag('span', ['class' => 'description', 'style' => 'display: block;margin-left: 50px;'])
                                        . '<i class="fa fa-clock-o"></i> ' . Yii::$app->formatter->asDatetime($model->sent_at)
                                        . Html::endTag('span')
                                        . Html::endTag('div');
                                echo $str;
                                ?>                                           

                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </li>

            <li class="footer"><a href="<?= Url::to(['/user/student']) ?>">View all</a></li>
        </ul>
    </li>


<?php endif; ?>
