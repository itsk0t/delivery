<div>
    <?php use yii\bootstrap5\LinkPager;

    foreach ($discount as $el) {
        if ($el->stop == 1) { ?>
            <div class="card">
                <div class="card-header">
                    <?php echo $el['title'] ?>
                </div>
                <div class="card-body">
                    <div class="">
                        <img src="image/<?php echo $el['image'] ?>" alt="<?php echo $el['title'] ?>" class="">
                    </div>
                    <p class="card-text"><?php echo $el['body'] ?></p>
                    <p class="card-text"><?php echo $el['deadline'] ?></p>
                    <a href="#" class="btn btn-primary">Перейти в меню</a>
                </div>
            </div>
        <?php } else {
            continue;
        }
    } ?>
</div>
<div>
    <div class="mt-4 d-flex justify-content-center">
        <?php echo LinkPager::widget(['pagination' => $pages]); ?>
    </div>
</div>