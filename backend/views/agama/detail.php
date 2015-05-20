<?php
use yii\helpers\Html;
use yii\widgets\DetailView;

?>

<div class="agama-view">
    
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'status',
            'created_by',
            'created_date',
            'updated_by',
            'updated_date',
        ],
    ]) ?>

    
</div>