<?php
use yii\helpers\Html;
use yii\widgets\DetailView;

?>

<div class="produksi-karyawan-view">
    
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'karyawan_id',
            'produk_kemaasan_id',
            'tanggal',
            'created_by',
            'created_date',
            'updated_by',
            'updated_date',
        ],
    ]) ?>

    
</div>