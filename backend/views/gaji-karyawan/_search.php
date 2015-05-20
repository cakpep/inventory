<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div class="karyawan-gaji-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'karyawan_id') ?>

    <?= $form->field($model, 'insentif') ?>

    <?= $form->field($model, 'bonus') ?>

    <?= $form->field($model, 'komisi') ?>

    <?php // echo $form->field($model, 'uang_bbm') ?>

    <?php // echo $form->field($model, 'uang_makan') ?>

    <?php // echo $form->field($model, 'uang_pulsa') ?>

    <?php // echo $form->field($model, 'diterima_oleh') ?>

    <?php // echo $form->field($model, 'yang_memberi') ?>

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
