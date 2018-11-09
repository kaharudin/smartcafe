<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;

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
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'memproses', 'index', 'stok','ajax'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            // 'verbs' => [
            //     'class' => VerbFilter::className(),
            //     'actions' => [
            //         'logout' => ['post'],
            //     ],
            // ],
            // 'access' => [
            //     'class' => AccessControl::className(),
            //     'only' => ['logout', 'signup'],
            //     'rules' => [
            //         [
            //             'actions' => ['signup'],
            //             'allow' => true,
            //             'roles' => ['?'],
            //         ],
            //         [
            //             'actions' => ['logout'],
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
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionMemproses()
    {
        return $this->render('memproses');
    }

    public function actionStok()
    {
        return $this->render('stok');
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post())) {
          if(!$model->login()){
            Yii::$app->session->setFlash('danger', 'Username/Password Salah.');
          }
            // var_dump("berhasil");die();

            return $this->goBack();
        } else {
            $this->layout = 'login';
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionAjax(){
      // $data['data'] = [
      //   ["&lt;span class='badge badge-pill badge-success'&gt;Completed&lt;&#47;span&gt;"]
      // ];
      $data['data'] = [
        ['<span class="badge badge-pill badge-success">Completed</span>','2018/11/28','Capucinno','3','kaharudin','<a href="#" class="btn btn-link btn-success btn-just-icon like"><i class="material-icons">check_circle_outline</i></a><a href="#" class="btn btn-link btn-danger btn-just-icon remove"><i class="material-icons">close</i></a>'],
        ['<span class="badge badge-pill badge-success">Completed</span>','2018/11/2','Nasi Goreng','1','triambudi','<a href="#" class="btn btn-link btn-success btn-just-icon like"><i class="material-icons">check_circle_outline</i></a><a href="#" class="btn btn-link btn-danger btn-just-icon remove"><i class="material-icons">close</i></a>'],
        ['<span class="badge badge-pill badge-danger">Canceled</span>','2018/11/8','Mocaccino','2','udin123','<a href="#" class="btn btn-link btn-success btn-just-icon like"><i class="material-icons">check_circle_outline</i></a><a href="#" class="btn btn-link btn-danger btn-just-icon remove"><i class="material-icons">close</i></a>']
      ];
      // $data['data'] = [
      // 	['&lt;span class="badge badge-pill badge-success"&gt;Completed&lt;&#47;span&gt;','2018/11/28','Capucinno','3','kaharudin','&lt;a href="#" class="btn btn-link btn-success btn-just-icon like"&gt;&lt;i class="material-icons"&gt;check_circle_outline&lt;&#47;i&gt;&lt;&#47;a&gt;&lt;a href="#" class="btn btn-link btn-danger btn-just-icon remove"&gt;&lt;i class="material-icons"&gt;close&lt;&#47;i&gt;&lt;&#47;a&gt;'],
      // 	['&lt;span class="badge badge-pill badge-success"&gt;Completed&lt;&#47;span&gt;','2018/11/2','Nasi Goreng','1','triambudi','&lt;a href="#" class="btn btn-link btn-success btn-just-icon like"&gt;&lt;i class="material-icons"&gt;check_circle_outline&lt;&#47;i&gt;&lt;&#47;a&gt;&lt;a href="#" class="btn btn-link btn-danger btn-just-icon remove"&gt;&lt;i class="material-icons"&gt;close&lt;&#47;i&gt;&lt;&#47;a&gt;'],
      // 	['&lt;span class="badge badge-pill badge-danger"&gt;Canceled&lt;&#47;span&gt;','2018/11/8','Mocaccino','2','udin123','&lt;a href="#" class="btn btn-link btn-success btn-just-icon like"&gt;&lt;i class="material-icons"&gt;check_circle_outline&lt;&#47;i&gt;&lt;&#47;a&gt;&lt;a href="#" class="btn btn-link btn-danger btn-just-icon remove"&gt;&lt;i class="material-icons"&gt;close&lt;&#47;i&gt;&lt;&#47;a&gt;']
      // ];
      echo json_encode($data);
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
}
