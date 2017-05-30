<?php

namespace backend\modules\borrowreturn\controllers;

use Yii;
use backend\modules\borrowreturn\models\Booking;
use backend\modules\borrowreturn\models\BookingSearch;

use yii\filters\VerbFilter;

use yii\web\Response;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

use yii\bootstrap\Nav;
use yii\bootstrap\Html;
use yii\bootstrap\ActiveForm;

use yii\helpers\ArrayHelper;

/**
 * BookingController implements the CRUD actions for Booking model.
 */
class BookingController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

	    public $admincontroller = [20];

    public function beforeAction(){
        foreach($this->admincontroller as $key){
            array_push(Yii::$app->controller->module->params['adminModule'],$key);
        }

        $moduleID = \Yii::$app->controller->module->id;

        Yii::$app->view->beginBlock('eqmenu');
            echo '<div class="box box-solid">
                    <div class="box-header with-border text-center">
                        <h3 class="box-title"> '.Yii::t($moduleID.'/app', 'BookingsSys').'</h3>

                        <!--<div class="box-tools">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        </div>-->
                    </div>
                    <div class="box-body no-padding">';
            echo Nav::widget([
                'options' => ['class' => 'nav nav-pills nav-stacked'],
                'encodeLabels' => false,
                //'linkTemplate' =>'<a href="{url}">{icon} {label} {badge}</a>',
                //'items' => $nav->menu(4),
                'items' => [
                    [
                        'label' => Html::icon('file').' '.Yii::t( $moduleID.'/app', 'draftform'),
                        'url' => ['site/index'],
                    ],
                    [
                        'label' => Html::icon('inbox').' '.Yii::t( $moduleID.'/app', 'offering'),
                        'url' => ['site/index'],
                    ],
                    [
                        'label' => Html::icon('saved').' '.Yii::t( $moduleID.'/app', 'approve'),
                        'url' => ['site/index'],
                    ],
                    [
                        'label' => Html::icon('export').' '.Yii::t( $moduleID.'/app', 'borrowed'),
                        'url' => ['site/index'],
                    ],
                    [
                        'label' => Html::icon('import').' '.Yii::t( $moduleID.'/app', 'returned'),
                        'url' => ['site/index'],
                    ],
                    [
                        'label' => Html::icon('duplicate').' '.Yii::t( $moduleID.'/app', 'allborrow'),
                        'url' => ['site/index'],
                        //'linkOptions' => [...],
                    ],
                ],
            ]);
            echo '</div>
                    <!-- /.box-body -->
                </div>';
        Yii::$app->view->endBlock();
        return true;
		  /* 
        if(ArrayHelper::isIn(Yii::$app->user->id, Yii::$app->controller->module->params['adminModule'])){
            //echo 'you are passed';
        }else{
            throw new ForbiddenHttpException('You have no right. Must be admin module.');
        }
        */
    }
	 
    /**
     * Lists all Booking models.
     * @return mixed
     */
    public function actionIndex()
    {
		 
		 Yii::$app->view->title = Yii::t('borrowreturn/app', 'Bookings').' - '.Yii::t('itinfo/app', Yii::$app->controller->module->params['title']);
		 
        $searchModel = new BookingSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Booking model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
		 $model = $this->findModel($id);
		 
		 Yii::$app->view->title = Yii::t('borrowreturn/app', 'Detail').' : '.$model->id.' - '.Yii::t('itinfo/app', Yii::$app->controller->module->params['title']);
		 
        return $this->render('view', [
            'model' => $model,
        ]);
    }

    /**
     * Creates a new Booking model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
		 Yii::$app->view->title = Yii::t('borrowreturn/app', 'Create').' - '.Yii::t('itinfo/app', Yii::$app->controller->module->params['title']);
		 
        $model = new Booking();

		/* if enable ajax validate
		if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
			Yii::$app->response->format = Response::FORMAT_JSON;
			return ActiveForm::validate($model);
		}*/
		
        if ($model->load(Yii::$app->request->post())) {
			if($model->save()){
				Yii::$app->getSession()->setFlash('addflsh', [
				'type' => 'success',
				'duration' => 4000,
				'icon' => 'glyphicon glyphicon-ok-circle',
				'message' => Yii::t('borrowreturn/app', 'UrDataCreated'),
				]);
			return $this->redirect(['view', 'id' => $model->id]);	
			}else{
				Yii::$app->getSession()->setFlash('addflsh', [
				'type' => 'danger',
				'duration' => 4000,
				'icon' => 'glyphicon glyphicon-remove-circle',
				'message' => Yii::t('borrowreturn/app', 'UrDataNotCreated'),
				]);
			}
            return $this->redirect(['view', 'id' => $model->id]);
        }

            return $this->render('create', [
                'model' => $model,
            ]);
        

    }

    /**
     * Updates an existing Booking model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
		 $model = $this->findModel($id);
		 
		 Yii::$app->view->title = Yii::t('borrowreturn/app', 'Update {modelClass}: ', [
    'modelClass' => 'Booking',
]) . $model->id.' - '.Yii::t('itinfo/app', Yii::$app->controller->module->params['title']);
		 
        if ($model->load(Yii::$app->request->post())) {
			if($model->save()){
				Yii::$app->getSession()->setFlash('edtflsh', [
				'type' => 'success',
				'duration' => 4000,
				'icon' => 'glyphicon glyphicon-ok-circle',
				'message' => Yii::t('borrowreturn/app', 'UrDataUpdated'),
				]);
			return $this->redirect(['view', 'id' => $model->id]);	
			}else{
				Yii::$app->getSession()->setFlash('edtflsh', [
				'type' => 'danger',
				'duration' => 4000,
				'icon' => 'glyphicon glyphicon-remove-circle',
				'message' => Yii::t('borrowreturn/app', 'UrDataNotUpdated'),
				]);
			}
            return $this->redirect(['view', 'id' => $model->id]);
        } 

            return $this->render('update', [
                'model' => $model,
            ]);
        

    }

    /**
     * Deletes an existing Booking model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
		
		Yii::$app->getSession()->setFlash('edtflsh', [
			'type' => 'success',
			'duration' => 4000,
			'icon' => 'glyphicon glyphicon-ok-circle',
			'message' => Yii::t('borrowreturn/app', 'UrDataDeleted'),
		]);
		

        return $this->redirect(['index']);
    }

    /**
     * Finds the Booking model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Booking the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Booking::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
