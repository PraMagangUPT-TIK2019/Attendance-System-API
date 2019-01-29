<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Absensi;
use app\models\Maganger;

/* @var $this yii\web\View */
/* @var $model app\models\Absensi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="absensi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'status_kedatangan')->textInput() ?>

    <?= $form->field($model, 'tanggal_waktu')->textInput() ?>

    <?= $form->field($model, 'laporan_kerja')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'nim')->dropDownList(ArrayHelper::map(Maganger::find()->all(), 'nim','nama_maganger' , 'kode_divisi' , 'password_maganger' , 'status_maganger'), array('promp' => 'Pilih Maganger')) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>