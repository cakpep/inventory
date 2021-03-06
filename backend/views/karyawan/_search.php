<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div class="karyawan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'karyawan_ktg_id') ?>

    <?= $form->field($model, 'karyawan_sistem_kerja_id') ?>

    <?= $form->field($model, 'nama') ?>

    <?= $form->field($model, 'jenkel') ?>

    <?php // echo $form->field($model, 'gapok') ?>

    <?php // echo $form->field($model, 'agama') ?>

    <?php // echo $form->field($model, 'no_telp') ?>

    <?php // echo $form->field($model, 'alamat') ?>

    <?php // echo $form->field($model, 'foto') ?>

    <div class="form-group">
        <?= Html::submitButton('<i class=\"glyphicon glyphicon-search\"></i> Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
