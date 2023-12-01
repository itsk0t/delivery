<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Datetable $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="datetable-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'weekdays')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'weekend')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
