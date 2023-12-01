<?php

namespace app\controllers;

use Yii;
use app\models\Basket;
use app\models\Orders;
use yii\web\Controller;

class OrderController extends Controller
{
    public $defaultAction = 'checkout';

    public function actionCheckout()
    {
        $order = new Orders();

        if ($order->load(Yii::$app->request->post())) {
            if (!$order->validate()) {
                Yii::$app->session->setFlash(
                    'checkout-success',
                    false
                );
                Yii::$app->session->setFlash(
                    'checkout-data',
                    [
                        'name' => $order->name,
                        'phone' => $order->phone,
                        'address' => $order->address,
                        'comments' => $order->comments
                    ]
                );
                Yii::$app->session->setFlash(
                    'checkout-errors',
                    $order->getErrors()
                );
            } else {
                $basket = new Basket();
                $content = $basket->getBasket();
                $order->amount = $content['amount'];
                $order->insert();
                $order->addItems($content);
                $basket->clearBasket();
                Yii::$app->session->setFlash(
                    'checkout-success',
                    true
                );
            }

            return $this->refresh();
        }
        return $this->render('checkout', ['order' => $order]);
    }
}