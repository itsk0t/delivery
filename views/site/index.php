<?php

/** @var yii\web\View $this */

use yii\bootstrap5\LinkPager;

$this->title = 'Меню';
?>
<div class="site-index">
    <div class="d-flex justify-content-between mt-4 card-group">
        <?php foreach ($category as $el) {
            if ($el->stop == 1) { ?>
                <div class="card shadow m-2 rounded-1" style="width: 18rem;">
                    <div style="width: 95%;" class="m-2">
                        <img src="image/<?php echo $el['image'] ?>" class="card-img-top rounded-1"
                             alt="<?php echo $el['name'] ?>">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-center h3"><?php echo $el['name'] ?></h5>
                        <a href="<?php echo \yii\helpers\Url::toRoute(['site/products', 'id' => $el['id']]) ?>" class="btn btn-primary w-100  mt-2">Перейти</a>
                    </div>
                </div>
            <?php } else {
                continue;
            }
        } ?>
    </div>

    <div class="mt-4 d-flex justify-content-center">
        <?php echo LinkPager::widget(['pagination' => $pages]); ?>
    </div>
</div>