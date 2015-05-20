<?php
use yii\helpers\Html;
use yii\widgets\DetailView;

?>

<div class="transaksi-detil-view">
    
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'transaksi_id',
            'produk_id',
            'jumlah',
            'diskon',
            'harga',
            'created_by',
            'created_date',
            'updated_by',
            'updated_date',
        ],
    ]) ?>

    
</div>