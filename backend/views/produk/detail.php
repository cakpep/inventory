<?php
use yii\helpers\Html;
use yii\widgets\DetailView;

?>

<div class="produk-view">
    
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'kode_produk',
            'nama_produk',
            'created_date',
            'created_by',
            'updated_date',
            'updated_by',
        ],
    ]) ?>

    
</div>