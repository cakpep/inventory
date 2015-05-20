<?php
use yii\helpers\Html;
use yii\widgets\DetailView;

?>

<div class="produk-bahan-view">
    
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'vendor_id',
            'produk_id',
            'produk_bahan_id',
            'tanggal_belanja',
            'jumlah',
            'harga',
            'stok',
            'created_by',
            'created_date',
            'updated_by',
            'updated_date',
        ],
    ]) ?>

    
</div>