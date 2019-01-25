<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Maganger */

$this->title = 'Tambah Data Maganger';
$this->params['breadcrumbs'][] = ['label' => 'Maganger', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="maganger-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
