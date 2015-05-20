<?php
use yii\helpers\Html;
use yii\widgets\DetailView;

?>

<div class="user-profil-view">
    
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'user_id',
            'nama',
            'jenkel',
            'tempat_lahir',
            'agama_id',
            'tgl_lahir',
            'alamat:ntext',
            'no_telp',
            'foto',
            'created_at',
            'updated_by',
            'updated_date',
        ],
    ]) ?>

    
</div>