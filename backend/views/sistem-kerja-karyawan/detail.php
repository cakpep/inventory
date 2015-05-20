<?php
use yii\helpers\Html;
use yii\widgets\DetailView;

?>

<div class="karyawan-sistem-kerja-ktg-view">
    
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nama',
            'created_by',
            'created_date',
            'updated_by',
            'updated_date',
        ],
    ]) ?>

    
</div>