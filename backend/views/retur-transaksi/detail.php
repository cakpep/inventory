<?php
use yii\helpers\Html;
use yii\widgets\DetailView;

?>

<div class="transaksi-retur-view">
    
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'transaksi_id',
            'produk_id',
            'tanggal',
            'jumlah',
            'diskon',
            'harga',
            'created_by',
            'created_date',
            'updated_by',
            'update_date',
        ],
    ]) ?>

    
</div>