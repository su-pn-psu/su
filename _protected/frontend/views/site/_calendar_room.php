<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\grid\GridView;
use suPnPsu\room\models\Room;

$searchModel = new suPnPsu\reserveRoom\models\RoomReserveSearch();
$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
?>
<div class="content">
    <div class="container">
        <section >

            <div class="row">
                <div class="col-sm-7">
                    <div class="heading">
                        <?= Html::tag('h3', 'ปฎิทินการใช้ห้อง', ['class' => '']) ?>                  
                    </div>


                    <?=
                    \yii2fullcalendar\yii2fullcalendar::widget(
                            [
                                //'events' => $events,                    
                                'ajaxEvents' => Url::toRoute(['/reserve-room/default/jsoncalendar']),
                                'options' => ['lang' => Yii::$app->language],
                                'header' => [
                                    'left' => 'prev,next today',
                                    'center' => 'title',
                                    'right' => 'month,basicWeek,basicDay'
                                ],
                                'clientOptions' => [
                                    'selectable' => false,
                                                                   'draggable' => false,
                                    'editable' => false,
                                    'timeFormat' => 'H(:mm)'
                                ],
                            ]
                    );
                    ?>

                </div>
                <div class="col-sm-5">
                    <div class="heading">
                        <?= Html::tag('h3', 'แผนการใช้ห้อง', ['class' => '']) ?>                  
                    </div>

                    <?php Pjax::begin(['id' => 'room-list']); ?> 
                    <?=
                    GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                                ['class' => 'yii\grid\SerialColumn'],
                            //'id',
                            //'code',
                            //'date_start:date',
                                [
                                'attribute' => 'date_range',
                                //    'format'=>'html',
                                //'filter' => RoomReserve::getItemStatus(),
                                'value' => 'dateRange'
                            ],
                                [
                                'attribute' => 'room_id',
                                //    'format'=>'html',
                                //'filter' => RoomReserve::getItemStatus(),
                                'value' => 'room.title'
                            ],
                            'subject',
                        //'user_'
                        //'timeRange',
                        ],
                        'tableOptions' => ['class' => 'table table-striped'],
                    ]);
                    ?>
                    <?php Pjax::end(); ?>  


                </div>


        </section>  
    </div>    
</div>        
</div>    