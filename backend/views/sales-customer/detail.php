<?php
use yii\helpers\Html;
use yii\widgets\DetailView;

?>

<div class="sales-customer-view">
    
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'karyawan_id',
            'customer_id',
        ],
    ]) ?>

    
</div>