<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="karyawan-gaji-form">

    <?php $form = ActiveForm::begin([
            'id'=>$model->formName(),        
            'fieldConfig' => [            
                'inputOptions' => [
                    'class'=>'form-control input-sm',
                ],
            ],
        ]); ?>
 
<div class="row">
	<div class="col-md-12">
        <div class="col-md-12">
			   <?php
        echo $form->field($model, 'karyawan_id')->widget(\kartik\select2\Select2::classname(), [
            'data' => \app\models\Data::karyawan(),
            'language' => 'en',
            'options' => ['placeholder' => 'Pilih Karyawan','class'=>'input-sm'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]); 
    ?>

		</div>
	</div>
	
	<div class="col-md-12">
        <div class="col-md-4">
			<?= $form->field($model, 'insentif')->textInput() ?>
		</div>
		<div class="col-md-4">
			<?= $form->field($model, 'bonus')->textInput() ?>
		</div>
		<div class="col-md-4">
			<?= $form->field($model, 'komisi')->textInput() ?>
		</div>
	</div>
	
	<div class="col-md-12">
        <div class="col-md-4">
			<?= $form->field($model, 'uang_bbm')->textInput() ?>
		</div>
		<div class="col-md-4">
			<?= $form->field($model, 'uang_makan')->textInput() ?>
		</div>
		<div class="col-md-4">
			<?= $form->field($model, 'uang_pulsa')->textInput() ?>
		</div>
	</div>
	<div class="col-md-12">
        <div class="col-md-12">
			<?= $form->field($model, 'diterima_oleh')->textInput() ?>
		</div>
	</div>
	<div class="col-md-12">
        <div class="col-md-12">
			<?= $form->field($model, 'yang_memberi')->textInput() ?>
		</div>
	</div>
	<div class="col-md-12">
        <div class="col-md-6">
			<?= $form->field($model, 'status_cetak')->textInput() ?>
		</div>
	</div>

</div>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '<i class=\'glyphicon glyphicon-ok\'></i> Simpan Data' : '<i class=\' glyphicon glyphicon-edit \'></i> Update Data', ['class' => $model->isNewRecord ? 'btn btn-success btn-flat btn-sm' : 'btn btn-primary btn-flat btn-sm']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php 
$script = <<<  JS
$('form#{$model->formName()}').on('beforeSubmit',function(e)
{
     var \$form = $(this);
    
    $.post(
        \$form.attr("action"), //serialize Yii2 form
        \$form.serialize()

     )
        .done(function(result){
        
            if(result.success==true){            
                // console.log(result);
                // $("#info").html(result.message);

                if(result.proses=='save'){            
                    $(\$form).trigger("reset");          
                }if(result.proses=='update'){            
                   $(document).find('#myModal').modal('hide'); 
                }

                $.notify(result.message, result.alert);
                $.pjax.reload({container:'#karyawan-gaji-gridview'});
                 
                
            }else{
                $(\$form).trigger("reset");
                $.notify(result.message, result.alert);
            }

        }).fail(function(){
            console.log("server eror");
        });

    return false;
    
    });

JS;

$this->registerJs($script);

?>