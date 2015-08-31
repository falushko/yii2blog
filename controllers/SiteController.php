<?php

namespace app\controllers;

use app\models\Users;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),

            ],
        ];
    }

    public function actions()
    {
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

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionSignUp()
    {
        $model = new Users();
        return $this->render('registration', ['model' => $model]);
    }

    public function actionRegistrate()
    {
        $model = new Users();
        $model->load(Yii::$app->request->post());
        $model->save();
        $message = 'Данные отправлены';
        return $this->render('registration', ['model' => $model, 'message' => $message]);
    }

    public function actionLogin()
    {
        $model = new Users();
        if (empty(Yii::$app->request->post())) {
            if (Yii::$app->user->isGuest) {
                return $this->render('login', ['model' => $model]);
            } else {
                return $this->render('logged_in');
            }

        } else {
            $post = Yii::$app->request->post();
            $identity = Users::find()
                ->where(['email' => $post['Users']['email'], 'password' => $post['Users']['password']])
                ->one();
            if ($identity !== null) {
                // logs in the user
                Yii::$app->user->login($identity);
                return $this->render('logged_in', ['message' => 'Вы залогинились']);
            } else {
                return $this->render('login', ['model' => $model, 'message' => 'Введите корректные данные']);
            }
        }
    }

    public function actionLogout()
    {
        if (!Yii::$app->user->isGuest) {
            Yii::$app->user->logout();
            $model = new Users();
            return $this->redirect('?r=site/login');
        }
    }

    /*public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }*/

}
