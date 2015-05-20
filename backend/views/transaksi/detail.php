<?php
use yii\helpers\Html;
use yii\widgets\DetailView;

?>

<div class="transaksi-view">
    
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'no_faktur',
            'customer_id',
            'tanggal_transaksi',
            'tanggal_bayar',
            'status_lunas',
            'diterima_oleh',
            'menyerahkan_oleh',
            'status_cetak',
            'created_by',
            'created_date',
            'updated_by',
            'updated_date',
        ],
    ]) ?>

    
</div>