<?php

namespace backend\modules\borrowreturn\controllers;

use Yii;
use backend\modules\borrowreturn\models\Borrowreturn;
use backend\modules\borrowreturn\models\BorrowreturnSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use yii\web\Response;
use yii\bootstrap\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;

/**
 * BorrowreturnController implements the CRUD actions for Borrowreturn model.
 */
class BorrowreturnController extends Controller
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
     * Lists all Borrowreturn models.
     * @return mixed
     */
    public function actionIndex()
    {
		 
		 Yii::$app->view->title = Yii::t('borrowreturn/app', 'Borrowreturns').' - '.Yii::t('itinfo/app', Yii::$app->controller->module->params['title']);
		 
        $searchModel = new BorrowreturnSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Borrowreturn model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
		 $model = $this->findModel($id);
		 
		 Yii::$app->view->title = Yii::t('borrowreturn/app', 'Detail').' : '.$model->booking_id.' - '.Yii::t('itinfo/app', Yii::$app->controller->module->params['title']);
		 
        return $this->render('view', [
            'model' => $model,
        ]);
    }

    /**
     * Creates a new Borrowreturn model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
		 Yii::$app->view->title = Yii::t('borrowreturn/app', 'Create').' - '.Yii::t('itinfo/app', Yii::$app->controller->module->params['title']);
		 
        $model = new Borrowreturn();

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
			return $this->redirect(['view', 'id' => $model->booking_id]);	
			}else{
				Yii::$app->getSession()->setFlash('addflsh', [
				'type' => 'danger',
				'duration' => 4000,
				'icon' => 'glyphicon glyphicon-remove-circle',
				'message' => Yii::t('borrowreturn/app', 'UrDataNotCreated'),
				]);
			}
            return $this->redirect(['view', 'id' => $model->booking_id]);
        }

            return $this->render('create', [
                'model' => $model,
            ]);
        

    }

    /**
     * Updates an existing Borrowreturn model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
		 $model = $this->findModel($id);
		 
		 Yii::$app->view->title = Yii::t('borrowreturn/app', 'Update {modelClass}: ', [
    'modelClass' => 'Borrowreturn',
]) . $model->booking_id.' - '.Yii::t('itinfo/app', Yii::$app->controller->module->params['title']);
		 
        if ($model->load(Yii::$app->request->post())) {
			if($model->save()){
				Yii::$app->getSession()->setFlash('edtflsh', [
				'type' => 'success',
				'duration' => 4000,
				'icon' => 'glyphicon glyphicon-ok-circle',
				'message' => Yii::t('borrowreturn/app', 'UrDataUpdated'),
				]);
			return $this->redirect(['view', 'id' => $model->booking_id]);	
			}else{
				Yii::$app->getSession()->setFlash('edtflsh', [
				'type' => 'danger',
				'duration' => 4000,
				'icon' => 'glyphicon glyphicon-remove-circle',
				'message' => Yii::t('borrowreturn/app', 'UrDataNotUpdated'),
				]);
			}
            return $this->redirect(['view', 'id' => $model->booking_id]);
        } 

            return $this->render('update', [
                'model' => $model,
            ]);
        

    }

    /**
     * Deletes an existing Borrowreturn model.
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
     * Finds the Borrowreturn model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Borrowreturn the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Borrowreturn::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
