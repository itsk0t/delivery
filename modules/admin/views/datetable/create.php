<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Datetable $model */

$this->title = 'Create Datetable';
$this->params['breadcrumbs'][] = ['label' => 'Datetables', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="datetable-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
