<?php
use yii\helpers\Html;
use yii\widgets\DetailView;

?>

<div class="produk-bahan-ktg-view">
    
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nama_bahan',
            'ket:ntext',
            'created_by',
            'created_date',
            'updated_by',
            'updated_date',
        ],
    ]) ?>

    
</div>