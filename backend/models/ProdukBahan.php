<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "produk_bahan".
 *
 * @property integer $vendor_id
 * @property integer $produk_id
 * @property integer $produk_bahan_id
 * @property string $tanggal_belanja
 * @property integer $jumlah
 * @property integer $harga
 * @property integer $stok
 * @property integer $created_by
 * @property string $created_date
 * @property integer $updated_by
 * @property string $updated_date
 *
 * @property Vendor $vendor
 * @property Produk $produk
 * @property ProdukBahanKtg $produkBahan
 */
class ProdukBahan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'produk_bahan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['vendor_id', 'produk_id', 'produk_bahan_id', 'jumlah', 'harga', 'stok', 'created_by', 'updated_by'], 'integer'],
            [['tanggal_belanja', 'created_date', 'updated_date'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'vendor_id' => 'Nama Vendor',
            'produk_id' => 'Nama Produk',
            'produk_bahan_id' => 'Bahan Produk',
            'tanggal_belanja' => 'Tanggal Belanja',
            'jumlah' => 'Jumlah',
            'harga' => 'Harga',
            'stok' => 'Stok',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
            'updated_by' => 'Updated By',
            'updated_date' => 'Updated Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVendor()
    {
        return $this->hasOne(Vendor::className(), ['id' => 'vendor_id']);
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
    public function getProdukBahan()
    {
        return $this->hasOne(ProdukBahanKtg::className(), ['id' => 'produk_bahan_id']);
    }
}
