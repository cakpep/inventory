<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div class="transaksi-retur-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'transaksi_id') ?>

    <?= $form->field($model, 'produk_id') ?>

    <?= $form->field($model, 'tanggal') ?>

    <?= $form->field($model, 'jumlah') ?>

    <?= $form->field($model, 'diskon') ?>

    <?php // echo $form->field($model, 'harga') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'created_date') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <?php // echo $form->field($model, 'update_date') ?>

    <div class="form-group">
        <?= Html::submitButton('<i class=\"glyphicon glyphicon-search\"></i> Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
