<?php
use yii\helpers\Html;
use yii\widgets\DetailView;

?>

<div class="sistem-kerjasama-view">
    
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'type_kerjasama',
            'created_by',
            'created_date',
            'updated_by',
            'updated_date',
        ],
    ]) ?>

    
</div>