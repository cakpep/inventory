<?php
 
namespace app\models;

use Yii;
use yii\base\Model;
use yii\helpers\ArrayHelper;


class Data extends Model
{


    public static function agama(){
        $data = ArrayHelper::map(Agama::find()
                                            ->where(['status'=>1])
                                            ->all(),'id','name');    
        return $data;
    }

    public static function customer(){
        $data = ArrayHelper::map(Customer::find()
                                            ->where(['status'=>1])
                                            ->all(),'id','nama');    
        return $data;
    }


    public static function customerKtg(){
        $data = ArrayHelper::map(CustomerKtg::find()
                                            ->where(['status'=>1])
                                            ->all(),'id','nama');    
        return $data;
    }

    public static function produk(){
        $data = ArrayHelper::map(Produk::find()->all(),'id','nama_produk');    
        return $data;
    }

    public static function produkKemasan(){
        $data = ArrayHelper::map(ProdukKemasan::find()->all(),'id','upah');    
        return $data;
    }

    public static function produkKemasanKtg(){
        $data = ArrayHelper::map(ProdukKemasanKtg::find()->where(['status'=>1])->all(),'id','nama_kemasan');    
        return $data;
    }

    public static function karyawan(){
        $data = ArrayHelper::map(Karyawan::find()
                                            ->where(['status'=>1])
                                            ->all(),'id','nama');    
        return $data;
    }

    public static function karyawanKtg(){
        $data = ArrayHelper::map(KaryawanKtg::find()
                                            ->where(['status'=>1])
                                            ->all(),'id','nama');    
        return $data;
    }

    public static function karyawanSistemKerja(){
        $data = ArrayHelper::map(KaryawanSistemKerjaKtg::find()
                                            ->all(),'id','nama');    
        return $data;
    }

    public static function customerSistemKerja(){
        $data = ArrayHelper::map(SistemKerjasama::find()
                                            ->all(),'id','type_kerjasama');    
        return $data;
    }




}
