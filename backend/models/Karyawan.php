<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "karyawan".
 *
 * @property integer $id
 * @property integer $karyawan_ktg_id
 * @property integer $karyawan_sistem_kerja_id
 * @property string $nama
 * @property string $jenkel
 * @property integer $gapok
 * @property integer $agama
 * @property string $no_telp
 * @property string $alamat
 * @property string $foto
 *
 * @property UserAgama $agama0
 * @property KaryawanKtg $karyawanKtg
 * @property KaryawanSistemKerjaKtg $karyawanSistemKerja
 * @property KaryawanAbsen[] $karyawanAbsens
 * @property KaryawanGaji[] $karyawanGajis
 * @property SalesCustomer[] $salesCustomers
 * @property Customer[] $customers
 */
class Karyawan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'karyawan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['karyawan_ktg_id', 'karyawan_sistem_kerja_id', 'gapok', 'agama'], 'integer'],
            [['jenkel', 'alamat'], 'string'],
            [['nama', 'foto'], 'string', 'max' => 50],
            [['no_telp'], 'string', 'max' => 12]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'karyawan_ktg_id' => 'Kategori Karyawan',
            'karyawan_sistem_kerja_id' => 'Sistem Kerja Karyawan',
            'nama' => 'Nama',
            'jenkel' => 'Jenis kelamin',
            'gapok' => 'Gaji pokok',
            'agama' => 'Agama',
            'no_telp' => 'No Telp',
            'alamat' => 'Alamat',
            'foto' => 'Foto',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAgama0()
    {
        return $this->hasOne(UserAgama::className(), ['id' => 'agama']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKaryawanKtg()
    {
        return $this->hasOne(KaryawanKtg::className(), ['id' => 'karyawan_ktg_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKaryawanSistemKerja()
    {
        return $this->hasOne(KaryawanSistemKerjaKtg::className(), ['id' => 'karyawan_sistem_kerja_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKaryawanAbsens()
    {
        return $this->hasMany(KaryawanAbsen::className(), ['karyawan_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKaryawanGajis()
    {
        return $this->hasMany(KaryawanGaji::className(), ['karyawan_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSalesCustomers()
    {
        return $this->hasMany(SalesCustomer::className(), ['karyawan_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomers()
    {
        return $this->hasMany(Customer::className(), ['id' => 'customer_id'])->viaTable('sales_customer', ['karyawan_id' => 'id']);
    }
}
