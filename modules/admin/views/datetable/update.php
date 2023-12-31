<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Datetable $model */

$this->title = 'Update Datetable: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Datetables', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="datetable-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
