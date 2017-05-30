<?php

use yii\helpers\Url;
use yii\helpers\Html;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (Yii::$app->user->can('staffUser')):
    ?>

    <!-- User Account: style can be found in dropdown.less -->
    <li class="dropdown notifications-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-user-plus"></i>

            <?php
            $searchModel = new \suPnPsu\user\models\UserSearchWaiting();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            $userCount = $dataProvider->getCount();

            if ($userCount):
                ?>
                <span class="label label-warning">
                    <?= $userCount ?>
                </span>
            <?php endif; ?>
        </a>

        <ul class="dropdown-menu">
            <?php if (Yii::$app->notification->count()): ?>
                <li class="header">You have <?= Yii::$app->notification->count() ?> notifications</li><?php endif; ?>
            <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">

                    <?php
                    // print_r(Yii::$app->notification->view());

                    foreach ($dataProvider->getModels() as $model):
                        $profile = $model->profile->resultInfo;
                        ?>
                        <li>
                            <a href="<?= Url::to(['/user/student/check', 'id' => $model->id]) ?>">
                                <?php
                                $str = Html::beginTag('div', ['class' => 'user-circle'])
                                        . Html::beginTag('div', ['class' => 'circle', 'style' => ''])
                                        . Html::img($profile->avatar, ['class' => '', 'style' => ''])
                                        . Html::endTag('div')
                                        . Html::beginTag('span', ['class' => 'username', 'style' => ''])
                                        . Html::tag('b', $profile->fullname)
                                        . Html::endTag('span')
                                        . Html::beginTag('span', ['class' => '', 'style' => 'display: block;margin-left: 50px;'])
                                        . 'ขอลงทะเบียนเข้าใช้งาน'
                                        . Html::endTag('span')
                                        . Html::beginTag('span', ['class' => 'description', 'style' => 'display: block;margin-left: 50px;'])
                                        . '<i class="fa fa-clock-o"></i> ' . Yii::$app->formatter->asDatetime($model->created_at)
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
