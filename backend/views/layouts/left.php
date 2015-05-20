<?php
use yii\bootstrap\Nav;
use yii\widgets\Menu;
use mdm\admin\components\MenuHelper;
// mdm\admin\components\MenuHelper::getAssignedMenu()
$items = MenuHelper::getAssignedMenu(Yii::$app->user->id);
?>
<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?= Yii::$app->user->identity->username ?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
       <!--  <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form> -->
        <!-- /.search form -->

            <!-- ?=
            Nav::widget(
                [
                    'encodeLabels' => false,
                    'options' => ['class' => 'sidebar-menu'],
                    'items' => $items
                                /*[
                        '<li class="header">Menu Yii2</li>',
                        ['label' => '<span class="fa fa-file-code-o"></span> Gii', 'url' => ['/gii']],
                        ['label' => '<span class="fa fa-dashboard"></span> Debug', 'url' => ['/debug']],
                        [
                            'label' => '<span class="glyphicon glyphicon-lock"></span> Sing in', //for basic
                            'url' => ['/site/login'],
                            'visible' =>Yii::$app->user->isGuest
                        ],
                    ],*/
                ]
            );
            ?> -->

            <!-- ?php
    echo Menu::widget([
        'items' => [
            ['label' => 'Home', 'url' => ['site/index']],
            ['label' => 'About', 'url' => ['site/about']],
            ['label' => 'Contact', 'url' => ['site/contact']],
        ],
        'options' => [
                        'class' => 'sidebar-menu',
                        /*'id'=>'navbar-id',
                        'style'=>'font-size: 14px;',
                        'data-tag'=>'yii2-menu',*/
                    ],
    ]);
    ?> -->

    <div id="cp-bckend-link" >
        <ul class="sidebar-menu">
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-refresh"></i> <span>Transaksi</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= \yii\helpers\Url::to(['/transaksi']) ?>"><i class="fa fa-circle-o"></i> Transaksi</a></li>                    
                    <li><a href="<?= \yii\helpers\Url::to(['/retur-transaksi']) ?>"><i class="fa fa-circle-o"></i> Retur Transaksi</a></li>                    
                    <li><a href="<?= \yii\helpers\Url::to(['/retur-transaksi']) ?>"><i class="fa fa-circle-o"></i> Laporan</a></li>                    
                </ul>
            </li>
        </ul>
        <ul class="sidebar-menu">
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-archive"></i> <span>Produksi</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= \yii\helpers\Url::to(['/produksi']) ?>"><i class="fa fa-circle-o"></i> Produksi</a></li>
					<li><a href="<?= \yii\helpers\Url::to(['/produk-bahan']) ?>"><i class="fa fa-circle-o"></i> Laporan</a></li> 
                    <li>
                        <a href="#"><i class="fa fa-circle-o"></i>Produk<i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="<?= \yii\helpers\Url::to(['/produk']) ?>"><i class="fa fa-circle-o"></i> Data Produk</a></li>
                            <li><a href="<?= \yii\helpers\Url::to(['/kemasan-produk']) ?>"><i class="fa fa-circle-o"></i> Data Kemasan</a></li>
                            <li><a href="<?= \yii\helpers\Url::to(['/produk-bahan']) ?>"><i class="fa fa-circle-o"></i> Data Bahan</a></li>                            
                            
                            <li>
                                <a href="#">
                                    <i class="fa fa-circle-o"></i> Data Master Produk <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="<?= \yii\helpers\Url::to(['/kategori-produk-bahan']) ?>"><i class="fa fa-circle-o"></i> Kategori Bahan Produk</a></li>
                                    <li><a href="<?= \yii\helpers\Url::to(['/kategori-kemasan-produk']) ?>"><i class="fa fa-circle-o"></i> Kategori Kemasan</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href="<?= \yii\helpers\Url::to(['/vendor']) ?>"><i class="fa fa-circle-o"></i> Vendor</a></li>
                </ul>

            </li>
        </ul>
         <ul class="sidebar-menu">
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-share"></i> <span>Konsumen</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= \yii\helpers\Url::to(['/customer']) ?>"><i class="fa fa-circle-o"></i> Konsumen</a></li>
                    <li>
                        <a href="#"><i class="fa fa-circle-o"></i> Data Konsumen<i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="<?= \yii\helpers\Url::to(['/kategori-customer']) ?>"><i class="fa fa-circle-o"></i> Kategori Konsumen</a></li>
                            <li><a href="<?= \yii\helpers\Url::to(['/sistem-kerjasama']) ?>"><i class="fa fa-circle-o"></i> Sistem Kerja Sama</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
        <ul class="sidebar-menu">
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i> <span>Karyawan</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= \yii\helpers\Url::to(['/karyawan']) ?>"><i class="fa fa-circle-o"></i> Karyawan</a></li>
                    <li>
                        <a href="#"><i class="fa fa-circle-o"></i> Data Karyawan<i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="<?= \yii\helpers\Url::to(['/absen-karyawan']) ?>"><i class="fa fa-calendar"></i> Presensi Karyawan</a></li>
                            <li><a href="<?= \yii\helpers\Url::to(['/gaji-karyawan']) ?>"><i class="fa fa-credit-card"></i> Gaji Karyawan</a></li>
                            <li><a href="<?= \yii\helpers\Url::to(['/pinjaman-karyawan']) ?>"><i class="fa fa-credit-card"></i> Pinjaman Karyawan</a></li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-users"></i> Data Master Karyawan <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="<?= \yii\helpers\Url::to(['/kategori-karyawan']) ?>"><i class="fa fa-users"></i> Kategori Karyawan</a></li>
                                    <li><a href="<?= \yii\helpers\Url::to(['/sistem-kerja-karyawan']) ?>"><i class="fa fa-circle-o"></i> Sisten Kerja Karyawan</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
         <ul class="sidebar-menu">
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-wrench"></i> <span>Settings</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">                    
                    <li>
                        <a href="#"><i class="fa fa-circle-o"></i> User<i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="<?= \yii\helpers\Url::to(['/user']) ?>"><i class="fa fa-circle-o"></i> User</a></li>
                            <li><a href="<?= \yii\helpers\Url::to(['/user/admin']) ?>"><i class="fa fa-circle-o"></i> User Admin</a></li>
                            <li><a href="<?= \yii\helpers\Url::to(['/user-akses']) ?>"><i class="fa fa-circle-o"></i> User Akses</a></li>
                            <li><a href="<?= \yii\helpers\Url::to(['/user-profil']) ?>"><i class="fa fa-circle-o"></i> User Profil</a></li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-circle-o"></i> Admin RBAC<i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="<?= \yii\helpers\Url::to(['/admin/assignment']) ?>"><span class="fa fa-file-code-o"></span> Assignment</a></li>
                                    <li><a href="<?= \yii\helpers\Url::to(['/admin/permission']) ?>"><span class="fa fa-file-code-o"></span> Permission</a></li>
                                    <li><a href="<?= \yii\helpers\Url::to(['/admin/role']) ?>"><span class="fa fa-file-code-o"></span> Role</a></li>                                    
                                    <li><a href="<?= \yii\helpers\Url::to(['/admin/menu']) ?>"><span class="fa fa-file-code-o"></span> Menu</a></li>                                    
                                    <li><a href="<?= \yii\helpers\Url::to(['/admin/route']) ?>"><span class="fa fa-file-code-o"></span> Route</a></li>                                    
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href="<?= \yii\helpers\Url::to(['/gii']) ?>"><span class="fa fa-file-code-o"></span> Gii</a></li>
                    <li><a href="<?= \yii\helpers\Url::to(['/debug']) ?>"><span class="fa fa-dashboard"></span> Debug</a></li>
                </ul>
            </li>
        </ul>
    </div>
    </section>

</aside>
