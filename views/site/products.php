<?php

/** @var yii\web\View $this */

//use yii\bootstrap5\LinkPager;

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Меню';
?>
<div>
    <button type="button" class="btn btn-light ml-3">
        <a href="<?php echo \yii\helpers\Url::toRoute(['site/index']) ?>" class="h6" style="text-decoration: none;">&#129044; Назад</a>
    </button>

</div>

<div class="d-flex justify-content-center mt-lg-4">
    <div class="site-index d-flex justify-content-center">
        <div class="row row-cols-1 row-cols-md-2 g-4">
            <?php foreach ($products as $el) {
                if ($el['category_id'] == $category['id']) {
                    if ($el->stop == 1) { ?>
                        <div class="card shadow m-3 rounded-1" style="width: 18rem;">
                            <div style="width: 95%;" class="m-2">
                                <img src="image/<?php echo $el['image'] ?>" class="card-img-top rounded-1"
                                     alt="<?php echo $el['name'] ?>">
                            </div>
                            <div class="card-body d-flex justify-content-between flex-column">
                                <h5 class="card-title text-center h3"><?php echo $el['name'] ?></h5>
                                <p class="card-text"><?php echo $el['body'] ?></p>
                                <p class="card-text">Цена: <b><?php echo $el['price']?>
                                        &#8381;</b></p>
                                <div>
                                    <?php if (Yii::$app->user->isGuest) { ?>
                                        <button type="button" class="btn w-100 rounded-5" style="background: #fff0e6;"
                                                data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            Добавить в корзину
                                        </button>
                                    <?php } else { ?>
                                        <form method="post" style="color: #d15700;"
                                              action="<?= Url::to(['basket/add']); ?>">
                                            <input type="hidden" name="id"
                                                   value="<?= $el['id']; ?>">
                                            <?=
                                            Html::hiddenInput(
                                                Yii::$app->request->csrfParam,
                                                Yii::$app->request->csrfToken
                                            );
                                            ?>
                                            <button type="submit" class="btn w-100 rounded-5" style="background: #fff0e6;">
                                                <i class="fa fa-shopping-cart" style="color: #d15700;"></i>
                                                Добавить в корзину
                                            </button>
                                        </form>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    <?php } else {
                        continue;
                    }
                } else {
                    continue;
                }
            } ?>
        </div>
    </div>

<!--  Модальное окно  -->
    <div>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Вы не вошли в систему</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                    </div>
                    <div class="modal-body d-flex justify-content-center">
                        <div class="d-flex flex-column">
                            <a class="btn btn-warning rounded-5 mt-2" href="<?php echo \yii\helpers\Url::toRoute(['site/signup']) ?>">Регистрация</a>
                            <a class="btn btn-warning rounded-5 mt-2" href="<?php echo \yii\helpers\Url::toRoute(['site/login']) ?>">Аторизация</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

