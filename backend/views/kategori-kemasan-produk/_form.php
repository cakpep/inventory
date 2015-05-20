<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
// use kartik\select2\select2ect2;
?>

<div class="produk-kemasan-ktg-form">
	
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
		<?= $form->field($model, 'nama_kemasan')->textInput(['maxlength' => true]) ?>
	</div>
	<div class="col-md-12">
			<?php
				echo $form->field($model, 'status')->widget(\kartik\select2\Select2::classname(), [
					'data' => array(1=>'Aktif',0=>'Tidak Aktif'),
					'language' => 'en',
					'options' => ['placeholder' => 'Status','class'=>'input-sm'],
					'pluginOptions' => [
						'allowClear' => true
					],
				]); 
			?>
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
                $.pjax.reload({container:'#produk-kemasan-ktg-gridview'});
                 
                
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