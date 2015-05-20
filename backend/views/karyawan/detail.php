<?php
use yii\helpers\Html;
use yii\widgets\DetailView;

?>

<div class="karyawan-view">
    
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'karyawan_ktg_id',
            'karyawan_sistem_kerja_id',
            'nama',
            'jenkel',
            'gapok',
            'agama',
            'no_telp',
            'alamat:ntext',
            'foto',
        ],
    ]) ?>

    
</div>