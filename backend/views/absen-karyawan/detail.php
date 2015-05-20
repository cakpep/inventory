<?php
use yii\helpers\Html;
use yii\widgets\DetailView;

?>

<div class="karyawan-absen-view">
    
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'karyawan_id',
            'tanggal',
            'jam_masuk',
            'jam_pulang',
            'created_by',
            'created_date',
            'updated_by',
            'updated_date',
        ],
    ]) ?>

    
</div>