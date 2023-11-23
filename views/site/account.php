<h1>Account</h1>

<h3>Your address</h3>
<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Адрес</th>
    </tr>
    </thead>
    <tbody class="table-group-divider">
    <?php foreach ($myaddress as $el) { ?>
        <tr>
            <th scope="row"><?php echo $el['id'] ?></th>
            <td><?php echo $el['city'].' '. $el['street'].' '.$el['house'].' '.$el['entrance'].' '.$el['floor'].' '.$el['apartment'] ?></td>
        </tr>
    <?php } ?>
    </tbody>
</table>

<div>
    <h3>Create address</h3>
    <?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;

    /** @var yii\web\View $this */
    /** @var app\models\Applications $model */
    /** @var ActiveForm $form */
    ?>
    <div class="site-proposal">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'city')->textInput(['autofocus'=>true]) ?>

        <?= $form->field($model, 'street')->textInput() ?>

        <?= $form->field($model, 'house')->textInput() ?>

        <?= $form->field($model, 'entrance')->textInput() ?>

        <?= $form->field($model, 'floor')->textInput() ?>

        <?= $form->field($model, 'apartment')->textInput() ?>

        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Добавить'), ['class' => 'btn btn-primary']) ?>
        </div>
        <?php ActiveForm::end(); ?>

    </div>
</div>