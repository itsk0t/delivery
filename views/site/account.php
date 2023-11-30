<h1>Account</h1>

<h4>Your address</h4>
<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th>Адрес (улица, дом)</th>
        <th>Подъезд</th>
        <th>Этаж</th>
        <th>Квартира</th>
    </tr>
    </thead>
    <tbody class="table-group-divider">
    <?php foreach ($myaddress as $el) { ?>
        <tr>
            <th scope="row"><?php echo $el['id'] ?></th>
            <td><?php echo $el['body'] ?></td>
            <td><?php echo $el['entrance'] ?></td>
            <td><?php echo $el['floor'] ?></td>
            <td><?php echo $el['apartment'] ?></td>
        </tr>
    <?php } ?>
    </tbody>
</table>

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Create address
</button>

<div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Create address</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                </div>
                <div class="modal-body">
                    <?php

                    use yii\helpers\Html;
                    use yii\widgets\ActiveForm;

                    /** @var yii\web\View $this */
                    /** @var app\models\Applications $model */
                    /** @var ActiveForm $form */
                    ?>
                    <div class="site-proposal">

                        <?php $form = ActiveForm::begin(); ?>

                        <?= $form->field($model, 'body')->textInput(['autofocus' => true]) ?>

                        <?= $form->field($model, 'entrance')->textInput() ?>

                        <?= $form->field($model, 'floor')->textInput() ?>

                        <?= $form->field($model, 'apartment')->textInput() ?>

                        <div class="form-group">
                            <?= Html::submitButton(Yii::t('app', 'Добавить'), ['class' => 'btn btn-primary']) ?>
                        </div>
                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>