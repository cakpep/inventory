<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="customer-form">

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
        <div class="col-md-4">
			<?php
				echo $form->field($model, 'customer_ktg_id')->widget(\kartik\select2\Select2::classname(), [
					'data' => \app\models\Data::customerKtg(),
					'language' => 'en',
					'options' => ['placeholder' => 'Kategori Konsumen','class'=>'input-sm'],
					'pluginOptions' => [
						'allowClear' => true
					],
				]); 
			?>
		</div>
		<div class="col-md-4">
			<?php
				echo $form->field($model, 'sistem_kerja_sama_id')->widget(\kartik\select2\Select2::classname(), [
					'data' => \app\models\Data::customerSistemKerja(),
					'language' => 'en',
					'options' => ['placeholder' => 'Sistem Kerja Sama','class'=>'input-sm'],
					'pluginOptions' => [
						'allowClear' => true
					],
				]); 
			?> 
		</div>
		<div class="col-md-4">
			<?php
				echo $form->field($model, 'status')->widget(\kartik\select2\Select2::classname(), [
					'data' => [0=>'Tidak Aktif',1=>'Aktif'],
					'language' => 'en',
					'options' => ['placeholder' => 'Status','class'=>'input-sm'],
					'pluginOptions' => [
						'allowClear' => true
					],
				]); 
			?> 
		</div>
	</div>
	
	<div class="col-md-12">
        <div class="col-md-3">
			<?= $form->field($model, 'kode_customer')->textInput(['maxlength' => true]) ?>
		</div>
		<div class="col-md-9">
			<?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>
		</div>
	</div>
	<div class="col-md-12">
        <div class="col-md-12">
			<?= $form->field($model, 'alamat')->textarea(['rows' => 6]) ?>
		</div>
	</div>
	
	<div class="col-md-12">
        <div class="col-md-4">
			<?= $form->field($model, 'no_telp')->textInput(['maxlength' => true]) ?>
		</div>
		<div class="col-md-8">
			<?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
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
                $.pjax.reload({container:'#customer-gridview'});
                 
                
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