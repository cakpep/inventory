<?php
use yii\helpers\Html;
use yii\widgets\DetailView;

?>

<div class="customer-view">
    
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'customer_ktg_id',
            'sistem_kerja_sama_id',
            'kode_customer',
            'nama',
            'alamat:ntext',
            'no_telp',
            'email:email',
            'created_by',
            'created_date',
            'updated_by',
            'updated_date',
        ],
    ]) ?>

    
</div>