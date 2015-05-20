<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div class="produk-kemasan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'produk_id') ?>

    <?= $form->field($model, 'kemasan_ktg_id') ?>

    <?= $form->field($model, 'upah') ?>

    <?= $form->field($model, 'modal') ?>

    <?= $form->field($model, 'harga_jual') ?>

    <?php // echo $form->field($model, 'stok') ?>

    <?php // echo $form->field($model, 'retur') ?>

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
