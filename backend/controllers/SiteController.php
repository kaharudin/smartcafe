<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use backend\models\RegisterForm;
use backend\models\TopupForm;
// use common\models\LoginForm;
use yii\helpers\Html;
use common\models\User;
use common\models\TopupHistory;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            // 'access' => [
            //     'class' => AccessControl::className(),
            //     'rules' => [
            //         [
            //             'actions' => ['login', 'error'],
            //             'allow' => true,
            //         ],
            //         [
            //             'actions' => ['logout', 'index'],
            //             'allow' => true,
            //             'roles' => ['@'],
            //         ],
            //     ],
            // ],
            // 'verbs' => [
            //     'class' => VerbFilter::className(),
            //     'actions' => [
            //         'logout' => ['post'],
            //     ],
            // ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
      $pesan = ['status'=>-1,'pesan'=>null];
      $model = new RegisterForm();
      if ($model->load(Yii::$app->request->post()) && $model->validate()) {
          if ($user = $model->register()) {
              $pesan = ['status'=>1,'pesan'=>"Register User berhasil."];
          }else{
              $pesan = ['status'=>0,'pesan'=>"Register User gagal.<br/>".Html::errorSummary($model)];
          }
      }

      return $this->render('index',[
        'model' => $model,
        'pesan' => $pesan,
      ]);
    }

    public function actionValidasiPembayaran(){
      return $this->render('validasi-pembayaran');
    }

    public function actionTopup(){
      $pesan = ['status'=>-1,'pesan'=>null];
      $model = new TopupForm();
      if ($model->load(Yii::$app->request->post()) && $model->validate()) {
          if ($topup = $model->topup()) {
              $pesan = ['status'=>1,'pesan'=>"Topup ".$topup->username." berhasil."];
          }else{
              $pesan = ['status'=>0,'pesan'=>"Topup gagal.<br/>".Html::errorSummary($model)];
          }
      }

      return $this->render('topup',[
        'model' => $model,
        'pesan' => $pesan,
      ]);
      // return $this->render('topup');
    }

    public function actionAvailableSpace(){
      return $this->render('available-space');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
