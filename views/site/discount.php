<div class="d-flex justify-content-center">
    <?php use yii\bootstrap5\LinkPager;

    foreach ($discount as $el) {
        if ($el->stop == 1) { ?>
            <div class="card w-50 p-0">
                <div class="card-header">
                    <?php echo $el['title'] ?>
                </div>
                <div class="card-body">
                    <div class="">
                        <img src="image/<?php echo $el['image'] ?>" alt="<?php echo $el['title'] ?>" class="w-100">
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