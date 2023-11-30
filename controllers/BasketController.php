<?php
namespace app\controllers;

use Yii;
use app\models\Basket;
use yii\web\Controller;

class BasketController extends Controller {

    public function actionIndex() {
        $basket = (new Basket())->getBasket();
        return $this->render('index', ['basket' => $basket]);
    }

    public function actionAdd() {

        $basket = new Basket();

        if (!Yii::$app->request->isPost) {
            return $this->redirect(['basket/index']);
        }

        $data = Yii::$app->request->post();
        if (!isset($data['id'])) {
            return $this->redirect(['basket/index']);
        }
        if (!isset($data['count'])) {
            $data['count'] = 1;
        }

        $basket->addToBasket($data['id'], $data['count']);

        if (Yii::$app->request->isAjax) {
            $this->layout = false;
            $content = $basket->getBasket();
            return $this->render('modal', ['basket' => $content]);
        } else {
            return $this->redirect(['basket/index']);
        }

    }

    public function actionRemove($id) {
        $basket = new Basket();
        $basket->removeFromBasket($id);

        if (Yii::$app->request->isAjax) {
            $this->layout = false;
            $content = $basket->getBasket();
            return $this->render('modal', ['basket' => $content]);
        } else { // без использования AJAX
            return $this->redirect(['basket/index']);
        }
    }

    public function actionClear() {
        $basket = new Basket();
        $basket->clearBasket();

        if (Yii::$app->request->isAjax) {
            $this->layout = false;
            $content = $basket->getBasket();
            return $this->render('modal', ['basket' => $content]);
        } else {
            return $this->redirect(['basket/index']);
        }
    }

    public function actionUpdate() {
        $basket = new Basket();

        if (!Yii::$app->request->isPost) {
            return $this->redirect(['basket/index']);
        }

        $data = Yii::$app->request->post();
        if (!isset($data['count'])) {
            return $this->redirect(['basket/index']);
        }
        if (!is_array($data['count'])) {
            return $this->redirect(['basket/index']);
        }

        $basket->updateBasket($data);

        if (Yii::$app->request->isAjax) {
            $this->layout = false;
            $content = $basket->getBasket();
            return $this->render('modal', ['basket' => $content]);
        } else {
            return $this->redirect(['basket/index']);
        }
    }

}