<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "produk".
 *
 * @property integer $id
 * @property string $kode_produk
 * @property string $nama_produk
 * @property string $created_date
 * @property integer $created_by
 * @property string $updated_date
 * @property integer $updated_by
 *
 * @property ProdukBahan[] $produkBahans
 * @property ProdukKemasan[] $produkKemasans
 * @property ProdukKemasanKtg[] $kemasanKtgs
 * @property TransaksiDetil[] $transaksiDetils
 * @property Transaksi[] $transaksis
 * @property TransaksiRetur[] $transaksiReturs
 */
class Produk extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'produk';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_date', 'updated_date'], 'safe'],
            [['created_by', 'updated_by'], 'integer'],
            [['kode_produk'], 'string', 'max' => 20],
            [['nama_produk'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kode_produk' => 'Kode Produk',
            'nama_produk' => 'Nama Produk',
            'created_date' => 'Created Date',
            'created_by' => 'Created By',
            'updated_date' => 'Updated Date',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProdukBahans()
    {
        return $this->hasMany(ProdukBahan::className(), ['produk_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProdukKemasans()
    {
        return $this->hasMany(ProdukKemasan::className(), ['produk_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKemasanKtgs()
    {
        return $this->hasMany(ProdukKemasanKtg::className(), ['id' => 'kemasan_ktg_id'])->viaTable('produk_kemasan', ['produk_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransaksiDetils()
    {
        return $this->hasMany(TransaksiDetil::className(), ['produk_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransaksis()
    {
        return $this->hasMany(Transaksi::className(), ['id' => 'transaksi_id'])->viaTable('transaksi_detil', ['produk_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransaksiReturs()
    {
        return $this->hasMany(TransaksiRetur::className(), ['produk_id' => 'id']);
    }
}
