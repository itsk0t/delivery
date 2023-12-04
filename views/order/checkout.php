<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

$name = '';
$email = '';
$phone = '';
$address = '';
$comment = '';
if (Yii::$app->session->hasFlash('checkout-data')) {
    $data = Yii::$app->session->getFlash('checkout-data');
    $name = Html::encode($data['name']);
    $phone = Html::encode($data['phone']);
    $address = Html::encode($data['address_id']);
    $comment = Html::encode($data['comments']);
}

$this->title = 'Оформление заказа';
?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-9">
                <h1>Оформление заказа</h1>
                <div id="checkout">
                    <?php
                    $success = false;
                    if (Yii::$app->session->hasFlash('checkout-success')) {
                        $success = Yii::$app->session->getFlash('checkout-success');
                    }
                    ?>

                    <?php if (!$success): ?>
                        <?php if (Yii::$app->session->hasFlash('checkout-errors')): ?>
                            <div class="alert alert-warning alert-dismissible" role="alert">
                                <button type="button" class="close"
                                        data-dismiss="alert" aria-label="Закрыть">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <p>При заполнении формы допущены ошибки</p>
                                <?php $allErrors = Yii::$app->session->getFlash('checkout-errors'); ?>
                                <ul>
                                    <?php foreach ($allErrors as $errors): ?>
                                        <?php foreach ($errors as $error): ?>
                                            <li><?= $error; ?></li>
                                        <?php endforeach; ?>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endif; ?>

                        <?php
                        $form = ActiveForm::begin(
                            ['id' => 'checkout-form', 'class' => 'form-horizontal']
                        );
                        echo $form->field($order, 'name')->textInput(['value' => $name]);

                        echo $form->field($order, 'phone')->textInput(['value' => $phone])->widget(\yii\widgets\MaskedInput::class, ['mask' => '8-(999)-999-99-99']);

                        echo $form->field($order, 'address_id')->textInput()->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Address::find()->all(), 'id', 'body'));

                        echo $form->field($order, 'comments')->textarea(['value' => $comment]);

                        echo Html::submitButton(
                            'Оформить заказ',
                            ['class' => 'btn btn-warning rounded-5']
                        );
                        ActiveForm::end();
                        ?>
                    <?php else: ?>
                        <p>Ваш заказ успешно оформлен, спасибо за покупку.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>