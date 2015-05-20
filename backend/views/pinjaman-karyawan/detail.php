<?php
use yii\helpers\Html;
use yii\widgets\DetailView;

?>

<div class="karyawan-pinjaman-view">
    
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'karyawan_id',
            'pinjam_jumlah',
            'pinjam_tgl',
            'status',
            'created_by',
            'created_date',
            'updated_by',
            'updated_date',
        ],
    ]) ?>

    
</div>