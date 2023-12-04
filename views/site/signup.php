<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */

/** @var app\models\SignupForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'Регистрация';
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="col-lg-5">

            <?php $form = ActiveForm::begin([
                'id' => 'signup-form',
                'fieldConfig' => [
                    'template' => "{label}\n{input}\n{error}",
                    'labelOptions' => ['class' => 'col-lg-1 col-form-label mr-lg-3'],
                    'inputOptions' => ['class' => 'col-lg-3 form-control'],
                    'errorOptions' => ['class' => 'col-lg-7 invalid-feedback'],
                ],
            ]); ?>

            <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
            <?= $form->field($model, 'name')->textInput() ?>
            <?= $form->field($model, 'date_birth')->textInput() ?>
            <?= $form->field($model, 'email')->textInput() ?>
            <?= $form->field($model, 'phone_number')->textInput()->widget(\yii\widgets\MaskedInput::class, ['mask' => '8-(999)-999-99-99']) ?>

            <?= $form->field($model, 'password')->passwordInput() ?>
            <?= $form->field($model, 'password_r')->passwordInput() ?>

            <div class="form-check mt-2 mb-2">
                <input class="form-check-input" type="checkbox" id="autoSizingCheck" required>
                <label class="form-check-label" for="autoSizingCheck">
                    Согласен с правилами регистрации.
                </label>
            </div>

            <div class="form-group mt-2">
                <div>
                    <?= Html::submitButton('Зарегистрироваться', ['class' => 'btn btn-warning rounded-5', 'name' => 'signup-button']) ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>
