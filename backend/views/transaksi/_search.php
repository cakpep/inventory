<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div class="transaksi-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'no_faktur') ?>

    <?= $form->field($model, 'customer_id') ?>

    <?= $form->field($model, 'tanggal_transaksi') ?>

    <?= $form->field($model, 'tanggal_bayar') ?>

    <?php // echo $form->field($model, 'status_lunas') ?>

    <?php // echo $form->field($model, 'diterima_oleh') ?>

    <?php // echo $form->field($model, 'menyerahkan_oleh') ?>

    <?php // echo $form->field($model, 'status_cetak') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'created_date') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <?php // echo $form->field($model, 'updated_date') ?>

    <div class="form-group">
        <?= Html::submitButton('<i class=\"glyphicon glyphicon-search\"></i> Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
