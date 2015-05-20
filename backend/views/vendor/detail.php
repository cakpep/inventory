<?php
use yii\helpers\Html;
use yii\widgets\DetailView;

?>

<div class="vendor-view">
    
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'kode_vendor',
            'nama',
            'no_telp',
            'alamat:ntext',
            'kecamatan',
            'kabupaten',
            'provinsi',
            'created_by',
            'created_date',
            'updated_by',
            'updated_date',
        ],
    ]) ?>

    
</div>