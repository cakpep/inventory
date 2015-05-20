<?php
use backend\widgets\Panel;
use yii\helpers\Html;
use yii\helpers\Url;


?>



<div class="row">
    <div class="col-sm-8">

    <?= Html::a('<i class="glyphicon glyphicon-plus"></i> Tambah Data', ['add-data'], [
                                                        'class' => 'btn btn-default btn-flat btn-sm',
                                                        'data-toggle'=>"modal",
                                                        'data-target'=>"#myModal",
                                                        'data-title'=>'<i class=\'glyphicon glyphicon-plus\'></i>  TAMBAH DATA',]); ?>


    <?= Html::a('<i class="glyphicon glyphicon-trash"></i> Hapus Seleksi', '#', [
                                                        'class' => 'btn btn-danger btn-flat btn-sm',
                                                        'onclick'=>'
                                                        var keys = $("#vendor-table-grid").yiiGridView("getSelectedRows");                
                                                        $.post( "'.Url::to(['delete-all','id'=>'']).'"+keys, function( data ) {
                                                            $.notify(data.message, data.alert);
                                                            $.pjax.reload({container: "#vendor-gridview",});
                                                        });

                                            ']) ?>
    </div>
    <div class="col-sm-2">
    <?= Html::textInput("srch_all","",['placeholder'=>"Cari...",'onkeyup'=>'
                                                            $.pjax.reload({
                                                                url: "'.Url::to(['index']).'?VendorSearch[srch_all]="+$(this).val(),
                                                                container: "#vendor-gridview",
                                                                timeout: 1000,
                                                            });
                                                            ','class'=>'form-control'])    ?>
    </div>        
    <div class="col-sm-2">
        
    <?php $data = array( 0=>'Aktif', 1=>'Tidak Aktif'); ?>

    <?= Html::dropDownList('status', null, $data,['prompt'=>'- Cari Status','onchange'=>'
                                                            $.pjax.reload({
                                                                url: "'.Url::to(['index']).'?VendorSearch[status]="+$(this).val(),
                                                                container: "#vendor-gridview",
                                                                timeout: 1000,
                                                            });
                                                            ','class'=>'form-control']) ?>
    </div>
</div>