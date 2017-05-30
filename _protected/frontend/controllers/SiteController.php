<?php

namespace frontend\controllers;

use common\models\User;
//use common\models\LoginForm;
use frontend\models\AccountActivation;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
//use frontend\models\SignupForm;
use suPnPsu\user\models\SignupForm;
use frontend\models\ContactForm;
use yii\helpers\Html;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use Yii;
use suPnPsu\user\models\LoginForm;

/**
 * Site controller.
 * It is responsible for displaying static pages, logging users in and out,
 * sign up and account activation, password reset.
 */
class SiteController extends Controller {

    /**
     * Returns a list of behaviors that this component should behave as.
     *
     * @return array
     */
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                        [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                        [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Declares external actions for the controller.
     *
     * @return array
     */
    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

//------------------------------------------------------------------------------------------------//
// STATIC PAGES
//------------------------------------------------------------------------------------------------//

    /**
     * Displays the index (home) page.
     * Use it in case your home page contains static content.
     *
     * @return string
     */
    public function actionIndex() {


        return $this->render('index');
    }

    /**
     * Displays the about static page.
     *
     * @return string
     */
    public function actionAbout() {
        return $this->render('about');
    }

    /**
     * Displays the contact static page and sends the contact email.
     *
     * @return string|\yii\web\Response
     */
    public function actionContact() {
        $model = new ContactForm();

        if (!$model->load(Yii::$app->request->post()) || !$model->validate()) {
            return $this->render('contact', ['model' => $model]);
        }

        if (!$model->sendEmail(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('error', Yii::t('app', 'There was some error while sending email.'));
            return $this->refresh();
        }

        Yii::$app->session->setFlash('success', Yii::t('app', 'Thank you for contacting us. We will respond to you as soon as possible.'));

        return $this->refresh();
    }

//------------------------------------------------------------------------------------------------//
// LOG IN / LOG OUT / PASSWORD RESET
//------------------------------------------------------------------------------------------------//

    /**
     * Logs in the user if his account is activated,
     * if not, displays appropriate message.
     *
     * @return string|\yii\web\Response
     */
    /*
      public function actionLogin() {
      // user is logged in, he doesn't need to login
      if (!Yii::$app->user->isGuest) {
      return $this->goHome();
      }

      // get setting value for 'Login With Email'
      $lwe = Yii::$app->params['lwe'];

      // if 'lwe' value is 'true' we instantiate LoginForm in 'lwe' scenario
      $model = $lwe ? new LoginForm(['scenario' => 'lwe']) : new LoginForm();

      // monitor login status
      $successfulLogin = true;

      // posting data or login has failed
      if (!$model->load(Yii::$app->request->post()) || !$model->login()) {
      $successfulLogin = false;
      }

      // if user's account is not activated, he will have to activate it first
      if ($model->status === User::STATUS_INACTIVE && $successfulLogin === false) {
      Yii::$app->session->setFlash('error', Yii::t('app', 'You have to activate your account first. Please check your email.'));
      return $this->refresh();
      }

      // if user is not denied because he is not active, then his credentials are not good
      if ($successfulLogin === false) {
      return $this->render('login', ['model' => $model]);
      }

      // login was successful, let user go wherever he previously wanted
      return $this->goBack();
      }
     */
    public function actionLogin() {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            //$this->layout = 'main';
            return $this->render('login', [
                        'model' => $model,
            ]);
        }
    }

    public function actionFormLogin() {
        // user is logged in, he doesn't need to login
        // get setting value for 'Login With Email'
        $lwe = Yii::$app->params['lwe'];

        // if 'lwe' value is 'true' we instantiate LoginForm in 'lwe' scenario
        $model = $lwe ? new LoginForm(['scenario' => 'lwe']) : new LoginForm();

        // monitor login status
        $successfulLogin = true;

        // posting data or login has failed
        if (!$model->load(Yii::$app->request->post()) || !$model->login()) {
            $successfulLogin = false;
        }

        // if user's account is not activated, he will have to activate it first
        if ($model->status === User::STATUS_INACTIVE && $successfulLogin === false) {
            Yii::$app->session->setFlash('error', Yii::t('app', 'You have to activate your account first. Please check your email.'));
            return $this->refresh();
        }

        // if user is not denied because he is not active, then his credentials are not good
        if ($successfulLogin === false) {
            return $this->renderAjax('_login', ['model' => $model]);
        }

        //exit();
        // login was successful, let user go wherever he previously wanted
        //return $this->goBack();
        //Yii::$app->getResponse()->redirect($this->goBack());
        $this->goBack();
        return '';
    }

    public function actionProfile() {

        if (!Yii::$app->user->isGuest) {
            return $this->renderPartial('_profile', ['user' => Yii::$app->user->identity->profile->resultInfo]);
        } else {
            return Yii::$app->runAction('/site/form-login');
        }
    }

    /**
     * Logs out the user.
     *
     * @return \yii\web\Response
     */
    public function actionLogout() {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /* ----------------*
     * PASSWORD RESET *
     * ---------------- */

    /**
     * Sends email that contains link for password reset action.
     *
     * @return string|\yii\web\Response
     */
    public function actionRequestPasswordReset() {
        $model = new PasswordResetRequestForm();

        if (!$model->load(Yii::$app->request->post()) || !$model->validate()) {
            return $this->render('requestPasswordResetToken', ['model' => $model]);
        }

        if (!$model->sendEmail()) {
            Yii::$app->session->setFlash('error', Yii::t('app', 'Sorry, we are unable to reset password for email provided.'));
            return $this->refresh();
        }

        Yii::$app->session->setFlash('success', Yii::t('app', 'Check your email for further instructions.'));

        return $this->goHome();
    }

    /**
     * Resets password.
     *
     * @param  string $token Password reset token.
     * @return string|\yii\web\Response
     *
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token) {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if (!$model->load(Yii::$app->request->post()) || !$model->validate() || !$model->resetPassword()) {
            return $this->render('resetPassword', ['model' => $model]);
        }

        Yii::$app->session->setFlash('success', Yii::t('app', 'New password was saved.'));

        return $this->goHome();
    }

//------------------------------------------------------------------------------------------------//
// SIGN UP / ACCOUNT ACTIVATION
//------------------------------------------------------------------------------------------------//

    /**
     * Signs up the user.
     * If user need to activate his account via email, we will display him
     * message with instructions and send him account activation email with link containing account activation token. 
     * If activation is not necessary, we will log him in right after sign up process is complete.
     * NOTE: You can decide whether or not activation is necessary, @see config/params.php
     *
     * @return string|\yii\web\Response
     */
    /*
      public function actionSignup() {
      // get setting value for 'Registration Needs Activation'
      $rna = Yii::$app->params['rna'];

      // if 'rna' value is 'true', we instantiate SignupForm in 'rna' scenario
      $model = $rna ? new SignupForm(['scenario' => 'rna']) : new SignupForm();

      // if validation didn't pass, reload the form to show errors
      if (!$model->load(Yii::$app->request->post()) || !$model->validate()) {
      return $this->render('signup', ['model' => $model]);
      }

      // try to save user data in database, if successful, the user object will be returned
      $user = $model->signup();

      if (!$user) {
      // display error message to user
      Yii::$app->session->setFlash('error', Yii::t('app', 'We couldn\'t sign you up, please contact us.'));
      return $this->refresh();
      }

      // user is saved but activation is needed, use signupWithActivation()
      if ($user->status === User::STATUS_INACTIVE) {
      $this->signupWithActivation($model, $user);
      return $this->refresh();
      }

      // now we will try to log user in
      // if login fails we will display error message, else just redirect to home page

      if (!Yii::$app->user->login($user)) {
      // display error message to user
      Yii::$app->session->setFlash('warning', Yii::t('app', 'Please try to log in.'));

      // log this error, so we can debug possible problem easier.
      Yii::error('Login after sign up failed! User ' . Html::encode($user->username) . ' could not log in.');
      }

      return $this->goHome();
      }
     */

    public function actionSignup() {
        //$this->layout = 'main-blank';
        $model = new SignupForm();
        //$model->scenario = 'signup';
        if ($model->load(Yii::$app->request->post())) {
            if ($data = $model->checkPsuPassport()) {
                //return $this->goHome();

                if ($data['status']) {
                    if ($user = $model->signup()) {
                        \suPnPsu\user\models\Profile::updateProfile($user->id, $data['info']);
                        Yii::$app->session->set('confirm_id', $user->id);
                        $this->redirect(['confirm']);
                    } else {
                        //echo $user['status'] ;
//                        print_r($model->signup());
//                        print_r($data);
//                        print_r($model->getErrors());
                    }
                }
            }
        }

        return $this->render('signup', [
                    'model' => $model,
        ]);
    }

    public function actionConfirm() {

        $saved = false;
        $session = Yii::$app->session;

        if ($session->has('confirm_id')) {
            $id = Yii::$app->session->get('confirm_id');

            $user = \suPnPsu\user\models\User::findOne($id);
            $profile = $user->profile;

            $person = $user->person ? $user->person : new \suPnPsu\user\models\Person();
            //$modelProfile = $model->pe;
            if ($profile->load(Yii::$app->request->post())) {
                $person->load(Yii::$app->request->post());

                $person->user_id = $user->id;
                $profile->save(false);
                $person->save(false);
                $saved = true;
                //Yii::$app->session->setFlash('sussess','บันทึกแล้ว');
                $session->remove('confirm_id');
                //return $this->goHome();
            }
            return $this->render('confirm', [
                        'user' => $user,
                        'profile' => $profile,
                        'person' => $person,
                        'saved' => $saved
            ]);
        } else {
            return $this->goBack();
        }
    }

    /**
     * Tries to send account activation email.
     *
     * @param $model
     * @param $user
     */
    private function signupWithActivation($model, $user) {
        // sending email has failed
        if (!$model->sendAccountActivationEmail($user)) {
            // display error message to user
            Yii::$app->session->setFlash('error', Yii::t('app', 'We couldn\'t send you account activation email, please contact us.'));

            // log this error, so we can debug possible problem easier.
            Yii::error('Signup failed! User ' . Html::encode($user->username) . ' could not sign up. 
                Possible causes: verification email could not be sent.');
        }

        // everything is OK
        Yii::$app->session->setFlash('success', Yii::t('app', 'Hello') . ' ' . Html::encode($user->username) . '. ' .
                Yii::t('app', 'To be able to log in, you need to confirm your registration. 
                Please check your email, we have sent you a message.'));
    }

    /* --------------------*
     * ACCOUNT ACTIVATION *
     * -------------------- */

    /**
     * Activates the user account so he can log in into system.
     *
     * @param  string $token
     * @return \yii\web\Response
     *
     * @throws BadRequestHttpException
     */
    public function actionActivateAccount($token) {
        try {
            $user = new AccountActivation($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if (!$user->activateAccount()) {
            Yii::$app->session->setFlash('error', Html::encode($user->username) . Yii::t('app', ' your account could not be activated, please contact us!'));
            return $this->goHome();
        }

        Yii::$app->session->setFlash('success', Yii::t('app', 'Success! You can now log in.') . ' ' .
                Yii::t('app', 'Thank you') . ' ' . Html::encode($user->username) . ' ' . Yii::t('app', 'for joining us!'));

        return $this->redirect(['login']);
    }

    public function actionDocs($page = null, $ext = null) {
        $this->layout = 'layout_docs';

        //return $this->render('docs',['page'=>$page]);

        switch ($ext) {
            case 'material' :
                $path = "@suPnPsu/borrowMaterial/";
                $title = 'การใช้งานระบบยืม-คืนพัสดุ';
                break;

            case 'room' :
                $path = "@suPnPsu/reserveRoom/";
                $title = 'การใช้งานระบบขอใช้ห้อง';
                break;

            case 'vehicle' :
                $path = "@vendor/su-pn-psu/yii2-borrow-vehicle/";
                $title = 'การใช้งานระบบขอใช้รถจักรยานยนตร์';
                break;

            default:
                $path = "@suPnPsu/core/";
                $title = 'แนะนำการใช้งานระบบ';
                break;
        }



        if (strpos($page, '.png') !== false) {
            $file = Yii::getAlias($path . $page);
            return Yii::$app->getResponse()->sendFile($file);
        }

        if ($page == null) {
            $page = 'docs/guide/basic-usage.md';
        }

        return $this->render('docs', [
                    'page' => $page,
                    'ext' => $ext,
                    'path' => $path,
                    'title' => $title
        ]);
    }

}
