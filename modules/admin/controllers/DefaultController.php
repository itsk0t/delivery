<?php

namespace app\modules\admin\controllers;

use app\models\ContactForm;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;

/**
 * Default controller for the `admin` module
 */
class DefaultController extends Controller
{
    public $layout = 'admin';
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['*'],
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            return \Yii::$app->user->identity->isAdmin();
                        }

                    ],
                ],
            ],
        ];
    }

    /**
     * Renders the index view for the module
     * @return string
     */


    public function actionIndex()
    {
        return $this->render('index');
    }
}
