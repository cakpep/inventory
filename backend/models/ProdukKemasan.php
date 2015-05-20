<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "produk_kemasan".
 *
 * @property integer $produk_id
 * @property integer $kemasan_ktg_id
 * @property integer $upah
 * @property integer $modal
 * @property integer $harga_jual
 * @property integer $stok
 * @property integer $retur
 * @property integer $created_by
 * @property string $created_date
 * @property integer $updated_by
 * @property string $updated_date
 *
 * @property Produk $produk
 * @property ProdukKemasanKtg $kemasanKtg
 */
class ProdukKemasan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'produk_kemasan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['produk_id', 'kemasan_ktg_id'], 'required'],
            [['produk_id', 'kemasan_ktg_id', 'upah', 'modal', 'harga_jual', 'stok', 'retur', 'created_by', 'updated_by'], 'integer'],
            [['created_date', 'updated_date'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'produk_id' => 'Nama Produk',
            'kemasan_ktg_id' => 'Kategori Kemasan',
            'upah' => 'Upah',
            'modal' => 'Modal',
            'harga_jual' => 'Harga Jual',
            'stok' => 'Stok',
            'retur' => 'Retur',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
            'updated_by' => 'Updated By',
            'updated_date' => 'Updated Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduk()
    {
        return $this->hasOne(Produk::className(), ['id' => 'produk_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKemasanKtg()
    {
        return $this->hasOne(ProdukKemasanKtg::className(), ['id' => 'kemasan_ktg_id']);
    }
}
