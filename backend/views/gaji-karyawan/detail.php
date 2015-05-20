<?php
use yii\helpers\Html;
use yii\widgets\DetailView;

?>

<div class="karyawan-gaji-view">
    
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'karyawan_id',
            'insentif',
            'bonus',
            'komisi',
            'uang_bbm',
            'uang_makan',
            'uang_pulsa',
            'diterima_oleh',
            'yang_memberi',
            'status_cetak',
            'created_by',
            'created_date',
            'updated_by',
            'updated_date',
        ],
    ]) ?>

    
</div>