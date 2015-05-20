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
                                                        var keys = $("#produk-kemasan-ktg-table-grid").yiiGridView("getSelectedRows");                
                                                        $.post( "'.Url::to(['delete-all','id'=>'']).'"+keys, function( data ) {
                                                            $.notify(data.message, data.alert);
                                                            $.pjax.reload({container: "#produk-kemasan-ktg-gridview",});
                                                        });

                                            ']) ?>
    </div>
    <div class="col-sm-2">
    <?= Html::textInput("srch_all","",['placeholder'=>"Cari...",'onkeyup'=>'
                                                            $.pjax.reload({
                                                                url: "'.Url::to(['index']).'?ProdukKemasanKtgSearch[srch_all]="+$(this).val(),
                                                                container: "#produk-kemasan-ktg-gridview",
                                                                timeout: 1000,
                                                            });
                                                            ','class'=>'form-control'])    ?>
    </div>        
    <div class="col-sm-2">
        
    <?php $data = array( 1=>'Aktif', 0=>'Tidak Aktif'); ?>

    <?= Html::dropDownList('status', null, $data,['prompt'=>'- Cari Status','onchange'=>'
                                                            $.pjax.reload({
                                                                url: "'.Url::to(['index']).'?ProdukKemasanKtgSearch[status]="+$(this).val(),
                                                                container: "#produk-kemasan-ktg-gridview",
                                                                timeout: 1000,
                                                            });
                                                            ','class'=>'form-control']) ?>
    </div>
</div>