<?php

namespace app\controllers;

use app\models\Address;
use app\models\Category;
use app\models\Discount;
use app\models\OrderItems;
use app\models\Orders;
use app\models\Products;
use app\models\SignupForm;
use Yii;
use yii\data\Pagination;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout', 'account'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['account'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
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
     * @return string
     */
    public function actionIndex()
    {
        $category = Category::find()->all();
        return $this->render('index', ['category'=>$category]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            if (Yii::$app->user->identity->isAdmin()) {
                return $this->redirect(['admin/']);
            }
            return $this->redirect(['site/index']);
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionSignup()
    {
        $model = new SignupForm();

        if($model->load(Yii::$app->request->post()) && $model->validate())
        {
            if ($user = $model -> signupSave())
            {
                return $this->redirect(['site/login']);
            }
        }

        return $this->render('signup', compact('model'));
    }

    public function actionProducts()
    {
        $products = Products::find()->all();
        $category = Category::find()->where(['id'=>$_GET['id']])->asArray()->one();
        return $this->render('products', ['category'=>$category, 'products' => $products]);
    }

    public function actionAccount()
    {
        $myaddress = Address::find()->where(['user_id'=>Yii::$app->user->getId()])->all();
        $myorders = Orders::find()->where(['user_id'=>Yii::$app->user->getId()])->all();
        $myordersitems = OrderItems::find()->all();
        $model = new Address();

        if($model->load(Yii::$app->request->post()) && $model->validate())
        {
            if ($model->save())
            {
                Yii::$app->session->setFlash('success', 'Адрес добавлен.');
                return $this->refresh();
            }
        }
        return $this->render('account', ['model'=>$model, 'myaddress'=>$myaddress, 'myorders'=>$myorders, 'myordersitems'=>$myordersitems]);
    }

    public function actionDiscount()
    {
        $discount = Discount::find()->all();
        return $this->render('discount', ['discount'=>$discount]);
    }
}
