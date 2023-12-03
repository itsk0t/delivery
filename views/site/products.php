<?php

/** @var yii\web\View $this */

//use yii\bootstrap5\LinkPager;

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Меню';
?>
<div>
    <a class="link-dark link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover h5 mb-3" href="<?php echo \yii\helpers\Url::toRoute(['site/index'])?>">&#129044; Назад</a>
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
                            <p class="card-text">Цена: <?php echo $el['price'] * $el->discount->percent ?> &#8381;</p>
                            <div>
                                <form method="post"
                                      action="<?= Url::to(['basket/add']); ?>">
                                    <input type="hidden" name="id"
                                           value="<?= $el['id']; ?>">
                                    <?=
                                    Html::hiddenInput(
                                        Yii::$app->request->csrfParam,
                                        Yii::$app->request->csrfToken
                                    );
                                    ?>
                                    <button type="submit" class="btn btn-warning w-100">
                                        <i class="fa fa-shopping-cart"></i>
                                        Добавить в корзину
                                    </button>
                                </form>
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

