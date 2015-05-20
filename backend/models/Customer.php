<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "customer".
 *
 * @property integer $id
 * @property integer $customer_ktg_id
 * @property integer $sistem_kerja_sama_id
 * @property string $kode_customer
 * @property string $nama
 * @property string $alamat
 * @property string $no_telp
 * @property string $email
 * @property integer $created_by
 * @property string $created_date
 * @property integer $updated_by
 * @property string $updated_date
 *
 * @property CustomerKtg $customerKtg
 * @property SistemKerjasama $sistemKerjaSama
 * @property SalesCustomer[] $salesCustomers
 * @property Karyawan[] $karyawans
 * @property Transaksi[] $transaksis
 */
class Customer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'customer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['customer_ktg_id', 'sistem_kerja_sama_id', 'created_by', 'updated_by'], 'integer'],
            [['alamat'], 'string'],
            [['created_date', 'updated_date'], 'safe'],
            [['kode_customer'], 'string', 'max' => 30],
            [['nama'], 'string', 'max' => 50],
            [['no_telp'], 'string', 'max' => 12],
            [['email'], 'string', 'max' => 25]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'customer_ktg_id' => 'Kategori Konsumen',
            'sistem_kerja_sama_id' => 'Sistem Kerja Sama',
            'kode_customer' => 'Kode Konsumen',
            'nama' => 'Nama',
            'alamat' => 'Alamat',
            'no_telp' => 'No Telp',
            'email' => 'Email',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
            'updated_by' => 'Updated By',
            'updated_date' => 'Updated Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomerKtg()
    {
        return $this->hasOne(CustomerKtg::className(), ['id' => 'customer_ktg_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSistemKerjaSama()
    {
        return $this->hasOne(SistemKerjasama::className(), ['id' => 'sistem_kerja_sama_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSalesCustomers()
    {
        return $this->hasMany(SalesCustomer::className(), ['customer_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKaryawans()
    {
        return $this->hasMany(Karyawan::className(), ['id' => 'karyawan_id'])->viaTable('sales_customer', ['customer_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransaksis()
    {
        return $this->hasMany(Transaksi::className(), ['customer_id' => 'id']);
    }
}
