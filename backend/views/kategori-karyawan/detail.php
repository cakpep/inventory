<?php
use yii\helpers\Html;
use yii\widgets\DetailView;

?>

<div class="karyawan-ktg-view">
    
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nama',
            'crated_by',
            'creted_date',
            'updated_by',
            'updated_date',
        ],
    ]) ?>

    
</div>