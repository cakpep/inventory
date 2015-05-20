<?php
use backend\widgets\Panel;
use yii\widgets\Pjax;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

$script = <<<  JS

    $('body').on('click', 'a#delete-gridview', function (event){
        var link = $(this)    
        var href = link.attr("href");            
            yii.confirm = function (message, ok, cancel) {
                bootbox.confirm(
                    {
                        message: message,
                        buttons: {
                            confirm: {
                                label: "OK"
                            },
                            cancel: {
                                label: "Cancel"
                            }
                        },
                        callback: function (confirmed) {
                            if (confirmed) {
                                // !ok || ok();                            
                                $.ajax({
                                    url: href,
                                    type: "post",
                                    success: function(data) {
                                        if(data.success==true){
                                            $(".bootbox").modal("hide")
                                            $.notify(data.message, data.alert);
                                            $.pjax.reload({container:"#vendor-gridview"})
                                        }
                                        else{
                                            alert("Saved");
                                        }                
                                    }
                                });
                                return false;

                            } else {
                                !cancel || cancel();
                            }
                        }
                    }
                );
                // confirm will always return false on the first call
                // to cancel click handler
                return false;
            }
    });

JS;

$this->registerJs($script);

$this->title = 'Data Vendor';
$this->params['breadcrumbs'][] = $this->title;

?>

<?php     Panel::begin([
        'title'=>"$this->title",
        'type'=>Panel::TYPE_DEFAULT
    ]);
?>


<div class="vendor-index">

    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php echo $this->render('_menu_srch'); ?>    

<hr>

<?php Pjax::begin(['id' => 'vendor-gridview']) ?> 
    <?= GridView::widget([
        'id'=>'vendor-table-grid',
        'tableOptions' =>['class' => 'table table-striped table-condensed table-hover'],
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            ['class' => 'yii\grid\CheckboxColumn'],

            'id',
            'kode_vendor',
            'nama',
            'no_telp',
            'alamat:ntext',
            // 'kecamatan',
            // 'kabupaten',
            // 'provinsi',
            // 'created_by',
            // 'created_date',
            // 'updated_by',
            // 'updated_date',
            
            [
                'class' => 'yii\grid\ActionColumn',
                'header'=>'Action',
                'headerOptions' => ['width' => '100'],
                'template' => '{view}{update}{delete}',
                'buttons' => [
                    'view' => function ($url,$model) {
                        return  Html::a('<i class="glyphicon glyphicon-search"></i>', ['detail-data','id'=>$model->id], [
                                                        'class' => 'btn btn-default btn-flat btn-xs',
                                                        'data-toggle'=>"modal",
                                                        'data-target'=>"#myModal",
                                                        'data-title'=>"<i class='glyphicon glyphicon-search'></i>  DETAIL DATA",]);
                    },
                    'update' => function ($url,$model) {
                        return  Html::a('<i class="glyphicon glyphicon-edit"></i>', ['update-data','id'=>$model->id], [
                                                        'class' => 'btn btn-default btn-flat btn-xs',
                                                        'data-toggle'=>"modal",
                                                        'data-target'=>"#myModal",
                                                        'data-title'=>"<i class='glyphicon glyphicon-edit'></i>  UPDATE DATA", ]);
                    },
                    'delete' => function ($url,$model) {
                        return  Html::a('<i class="glyphicon glyphicon-trash"></i>', ['delete', 'id' => $model->id], [
                                'class' => 'btn btn-danger btn-flat btn-xs',
                                'id'=>'delete-gridview',
                                'data' => [
                                    'confirm' => 'Apa Anda Yakin Akan Menghapus Data Ini?',
                                    'method' => 'post',
                                ],
                            ]);
                    }

                ],
                
                
            ],
        ],
    ]); ?>
<?php Pjax::end() ?>
</div>
<?php Panel::end(); ?>