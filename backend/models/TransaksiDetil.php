<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "transaksi_detil".
 *
 * @property integer $transaksi_id
 * @property integer $produk_id
 * @property integer $jumlah
 * @property double $diskon
 * @property integer $harga
 * @property integer $created_by
 * @property string $created_date
 * @property integer $updated_by
 * @property string $updated_date
 *
 * @property Produk $produk
 * @property Transaksi $transaksi
 */
class TransaksiDetil extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'transaksi_detil';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['transaksi_id', 'produk_id'], 'required'],
            [['transaksi_id', 'produk_id', 'jumlah', 'harga', 'created_by', 'updated_by'], 'integer'],
            [['diskon'], 'number'],
            [['created_date', 'updated_date'], 'safe']
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
            'jumlah' => 'Jumlah',
            'diskon' => 'Diskon',
            'harga' => 'Harga',
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
    public function getTransaksi()
    {
        return $this->hasOne(Transaksi::className(), ['id' => 'transaksi_id']);
    }
}
