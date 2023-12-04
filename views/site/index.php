<?php

/** @var yii\web\View $this */

use yii\bootstrap5\LinkPager;

$this->title = 'Меню';
?>
<div class="site-index d-flex justify-content-center mt-4">
    <div class="row row-cols-1 row-cols-md-2 g-4">
        <?php foreach ($category as $el) {
            if ($el->stop == 1) { ?>
                <div class="card shadow m-3 rounded-1" style="width: 18rem;">
                    <div style="width: 95%;" class="m-2">
                        <img src="image/<?php echo $el['image'] ?>" class="card-img-top rounded-1"
                             alt="<?php echo $el['name'] ?>">
                    </div>
                    <div class="card-body d-flex justify-content-between flex-column ">
                        <h5 class="card-title text-center h3"><?php echo $el['name'] ?></h5>
                        <div>
                            <a href="<?php echo \yii\helpers\Url::toRoute(['site/products', 'id' => $el['id']]) ?>" class="btn btn-warning w-100  mt-2 rounded-5">Перейти</a>
                        </div>
                    </div>
                </div>
            <?php } else {
                continue;
            }
        } ?>
    </div>

<!--    <div class="mt-4 d-flex justify-content-center">-->
<!--        --><?php //echo LinkPager::widget(['pagination' => $pages]); ?>
<!--    </div>-->
</div>