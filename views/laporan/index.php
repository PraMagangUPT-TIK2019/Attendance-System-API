<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use kartik\form\ActiveForm;
use kartik\daterange\DateRangePicker;
/* @var $this yii\web\View */
/* @var $searchModel app\models\AbsensiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Laporan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="absensi-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <p>Masukkan range tanggal presensi yang akan diambil laporannya.</p>
    <form action="" class="form-inline">
        <?php
        $form = ActiveForm::begin();
        echo $form->field($model, 'tanggal_waktu', [
            'addon'=>['prepend'=>['content'=>'<i class="glyphicon glyphicon-calendar"></i>']],
            'options'=>['class'=>'drp-container form-group', ],
            'showLabels' => false,
        ])->widget(DateRangePicker::classname(), [
            'useWithAddon'=>true
        ]);
        ?>
        <div class="form-group">
            <?= Html::submitButton('Lihat Laporan', ['class' => 'btn btn-primary']) ?>
            <?= Html::submitButton('Lihat Semua', ['class' => 'btn btn-success', 'name' => 'method', 'value' => 'show-all']) ?>
        </div>
        
        <?php
        ActiveForm::end();
        ?>
        
    </form>
    
    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <br/>
    <?php 
        if ($dataProvider !== null){
        if ($dataProvider == false):
    ?>
        <p> Data Tidak Ditemukan</p>
    <?php
    else:
    ?>
    <form action="" method="GET">
        <input type="hidden" name="export" value="true">
        <input type="hidden" name="Absensi[tanggal_waktu]" value="<?=$dateRange['tanggal_waktu'];?>">
        <input type="hidden" name="method" value="<?=$dataMethod;?>">
        <button class="btn btn-success" type="submit"><span class="glyphicon glyphicon-download"></span> Download Laporan</button>
    </form>
    <!-- <?= Html::a('<span class="glyphicon glyphicon-download"></span> Download Laporan', ['test'], ['class' => 'btn btn-success']) ?> -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped table-responsive">
                <thead>
                <tr>
                  <th>No</th>
                  <th>NIM</th>
                  <th>Tanggal / Waktu</th>
                  <th>Laporan Kerja</th>
                  <th>Status Kedatangan</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($dataProvider as $index => $tb_1): ?>
                    <tr>
                    <th><?=($index + 1)?></th>
                    <th><?=$tb_1['nim']?></th>
                    <th><?=$tb_1['tanggal_waktu']?></th>
                    <th><?=$tb_1['laporan_kerja'] == NULL ?  '-' : $tb_1['laporan_kerja']?></th>
                    <th><?=$tb_1['status_kedatangan'] == 1 ?'Berangkat' : 'Pulang'?></th>
                    </tr>
                <?php endforeach; ?>
                </tbody>
                <tfoot>
                </tfoot>
              </table>
            </div>
    </div>
    <?php
        endif;    
}
    ?>
</div>
