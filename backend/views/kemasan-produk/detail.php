<?php
use yii\helpers\Html;
use yii\widgets\DetailView;

?>

<div class="produk-kemasan-view">
    
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'produk_id',
            'kemasan_ktg_id',
            'upah',
            'modal',
            'harga_jual',
            'stok',
            'retur',
            'created_by',
            'created_date',
            'updated_by',
            'updated_date',
        ],
    ]) ?>

    
</div>