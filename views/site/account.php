<h1>Account</h1>

<div>
    <h4>Your orders</h4>
    <div>
        <?php foreach ($myorders as $item) { ?>
            <div class="card mb-3">
                <div class="card-header">
                    Заказ №-<?php echo $item['id'] ?>
                </div>
                <div class="card-body">
                    <div>
                        <p class="card-text"><b>В заказе:</b></p>
                        <ol>
                            <?php foreach ($myordersitems as $elor) { if ($item['id'] == $elor['order_id']) {?>
                                <li><?php echo $elor['name'] . ' ' . $elor['quantity'] . 'шт. ' . $elor['price']*$elor['quantity']?>  &#8381;</li>
                            <?php } else { continue;} } ?>
                        </ol>
                    </div>

                    <p class="card-text"><b>Адрес заказа:</b> <?php echo $item->address->body ?></p>
                    <p class="card-text"><b>Сумма заказа:</b> <?php echo $item['amount'] ?> &#8381;</p>
                    <p class="card-text"><b>Время заказа:</b> <?php echo $item['created'] ?></p>
                    <p class="card-text"><b>Статус заказа:</b> <?php echo $item->getStatus()?></p>
                    <?php if ($item->status != 4) { ?>
                        <div class="spinner-border text<?php echo $item->getColor() ?>" role="status">
                            <span class="visually-hidden">Загрузка...</span>
                        </div>
                    <?php } else { ?>
                        <div class="spinner-grow text<?php echo $item->getColor() ?>" role="status">
                            <span class="visually-hidden">Загрузка...</span>
                        </div>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<div>
    <h4>Your address</h4>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th>Адрес (Улица, дом, подъезд, этаж, квартира)</th>
        </tr>
        </thead>
        <tbody class="table-group-divider">
        <?php foreach ($myaddress as $el) { ?>
            <tr>
                <th scope="row"><?php echo $el['id'] ?></th>
                <td><?php echo $el['body'] ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>


<!--Модальное окно-->
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
                    /** @var ActiveForm $form */
                    ?>
                    <div class="site-proposal">

                        <?php $form = ActiveForm::begin(); ?>

                        <?= $form->field($model, 'body')->textInput(['autofocus' => true]) ?>

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