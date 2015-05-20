<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "transaksi_retur".
 *
 * @property integer $transaksi_id
 * @property integer $produk_id
 * @property string $tanggal
 * @property integer $jumlah
 * @property integer $diskon
 * @property integer $harga
 * @property integer $created_by
 * @property string $created_date
 * @property integer $updated_by
 * @property string $update_date
 *
 * @property Transaksi $transaksi
 * @property Produk $produk
 */
class TransaksiRetur extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'transaksi_retur';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['transaksi_id', 'produk_id'], 'required'],
            [['transaksi_id', 'produk_id', 'jumlah', 'diskon', 'harga', 'created_by', 'updated_by'], 'integer'],
            [['tanggal', 'created_date', 'update_date'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'transaksi_id' => 'ID Transaksi',
            'produk_id' => 'Nama Produk',
            'tanggal' => 'Tanggal',
            'jumlah' => 'Jumlah',
            'diskon' => 'Diskon',
            'harga' => 'Harga',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
            'updated_by' => 'Updated By',
            'update_date' => 'Update Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransaksi()
    {
        return $this->hasOne(Transaksi::className(), ['id' => 'transaksi_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduk()
    {
        return $this->hasOne(Produk::className(), ['id' => 'produk_id']);
    }
}
