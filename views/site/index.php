<?php

/** @var yii\web\View $this */

$this->title = 'Меню';
?>
<div class="site-index">
    <div class="d-flex justify-content-between mt-2">
        <?php foreach ($category as $el) { if ($el->stop == 1) { ?>
                <div class="card shadow" style="width: 18rem;">
                    <div style="width: 95%;" class="m-2">
                        <img src="image/<?php echo $el['image'] ?>" class="card-img-top"
                             alt="<?php echo $el['name'] ?>">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-center h3"><?php echo $el['name'] ?></h5>
                        <a href="#" class="btn btn-primary w-100  mt-2">Перейти</a>
                    </div>
                </div>
            <?php } else {continue;}} ?>
    </div>
</div>