<?php

/** @var yii\web\View $this */

//use yii\bootstrap5\LinkPager;

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = '';
?>
<div class="site-index">
    <div class="d-flex justify-content-between mt-4 card-group">
        <?php foreach ($products as $el) {
            if ($el['category_id'] == $category['id']) {
                if ($el->stop == 1) { ?>
                    <div class="card shadow m-2 rounded-1" style="width: 18rem;">
                        <div style="width: 95%;" class="m-2">
                            <img src="image/<?php echo $el['image'] ?>" class="card-img-top rounded-1"
                                 alt="<?php echo $el['name'] ?>">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title text-center h3"><?php echo $el['name'] ?></h5>
                            <p class="card-text"><?php echo $el['body'] ?></p>
                            <p class="card-text">Цена: <?php echo $el['price'] * $el->discount->percent ?> &#8381;</p>
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
                                <button type="submit" class="btn btn-warning">
                                    <i class="fa fa-shopping-cart"></i>
                                    Добавить в корзину
                                </button>
                            </form>
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

    <!--    <div class="mt-4 d-flex justify-content-center">-->
    <!--        --><?php //echo LinkPager::widget(['pagination' => $pages]); ?>
    <!--    </div>-->
</div>