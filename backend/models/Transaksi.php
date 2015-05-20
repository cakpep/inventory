<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "transaksi".
 *
 * @property integer $id
 * @property string $no_faktur
 * @property integer $customer_id
 * @property string $tanggal_transaksi
 * @property string $tanggal_bayar
 * @property string $status_lunas
 * @property string $diterima_oleh
 * @property integer $menyerahkan_oleh
 * @property string $status_cetak
 * @property integer $created_by
 * @property string $created_date
 * @property integer $updated_by
 * @property string $updated_date
 *
 * @property Customer $customer
 * @property TransaksiDetil[] $transaksiDetils
 * @property Produk[] $produks
 * @property TransaksiRetur[] $transaksiReturs
 */
class Transaksi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'transaksi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['customer_id', 'menyerahkan_oleh', 'created_by', 'updated_by'], 'integer'],
            [['tanggal_transaksi', 'tanggal_bayar', 'created_date', 'updated_date'], 'safe'],
            [['status_lunas', 'status_cetak'], 'string'],
            [['no_faktur'], 'string', 'max' => 20],
            [['diterima_oleh'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'no_faktur' => 'No Faktur',
            'customer_id' => 'Nama Customer',
            'tanggal_transaksi' => 'Tanggal Transaksi',
            'tanggal_bayar' => 'Tanggal Bayar',
            'status_lunas' => 'Status Lunas',
            'diterima_oleh' => 'Diterima Oleh',
            'menyerahkan_oleh' => 'Menyerahkan Oleh',
            'status_cetak' => 'Status Cetak',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
            'updated_by' => 'Updated By',
            'updated_date' => 'Updated Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(Customer::className(), ['id' => 'customer_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransaksiDetils()
    {
        return $this->hasMany(TransaksiDetil::className(), ['transaksi_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduks()
    {
        return $this->hasMany(Produk::className(), ['id' => 'produk_id'])->viaTable('transaksi_detil', ['transaksi_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransaksiReturs()
    {
        return $this->hasMany(TransaksiRetur::className(), ['transaksi_id' => 'id']);
    }
}
