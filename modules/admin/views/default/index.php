<div class="admin-default-index">
    <div class="d-flex justify-content-between">
        <?php foreach ($dec as $el) { ?>
            <div class="card m-2" style="width: 18rem;">
                <img src="image/<?php echo $el['image'] ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <a href="<?php echo \yii\helpers\Url::toRoute([$el->link])?>" class="btn btn-success w-100">Перейти</a>
                </div>
            </div>
        <?php } ?>
    </div>
<!--    <a href="--><?php //echo \yii\helpers\Url::toRoute(['category/index'])?><!--" class="btn btn-success">Категории</a>-->
<!--    <a href="--><?php //echo \yii\helpers\Url::toRoute(['products/index'])?><!--" class="btn btn-success">Продукты</a>-->
<!--    <a href="--><?php //echo \yii\helpers\Url::toRoute(['discount/index'])?><!--" class="btn btn-success">Акции</a>-->
<!--    <a href="--><?php //echo \yii\helpers\Url::toRoute(['user/index'])?><!--" class="btn btn-success">Пользователи</a>-->
<!--    <a href="--><?php //echo \yii\helpers\Url::toRoute(['address/index'])?><!--" class="btn btn-success">Адреса пользователей</a>-->
<!--    <a href="--><?php //echo \yii\helpers\Url::toRoute(['datetable/index'])?><!--" class="btn btn-success">Расписание работы</a>-->
</div>