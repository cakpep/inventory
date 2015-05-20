<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vendor".
 *
 * @property integer $id
 * @property string $kode_vendor
 * @property string $nama
 * @property string $no_telp
 * @property string $alamat
 * @property integer $kecamatan
 * @property integer $kabupaten
 * @property integer $provinsi
 * @property integer $created_by
 * @property string $created_date
 * @property integer $updated_by
 * @property string $updated_date
 *
 * @property ProdukBahan[] $produkBahans
 * @property IndoKabupaten $kabupaten0
 * @property IndoProvinsi $provinsi0
 */
class Vendor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vendor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['alamat'], 'string'],
            [['kecamatan', 'kabupaten', 'provinsi', 'created_by', 'updated_by'], 'integer'],
            [['created_date', 'updated_date'], 'safe'],
            [['kode_vendor'], 'string', 'max' => 20],
            [['nama'], 'string', 'max' => 60],
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
            'kode_vendor' => 'Kode Vendor',
            'nama' => 'Nama',
            'no_telp' => 'No Telp',
            'alamat' => 'Alamat',
            'kecamatan' => 'Kecamatan',
            'kabupaten' => 'Kabupaten',
            'provinsi' => 'Provinsi',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
            'updated_by' => 'Updated By',
            'updated_date' => 'Updated Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProdukBahans()
    {
        return $this->hasMany(ProdukBahan::className(), ['vendor_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKabupaten0()
    {
        return $this->hasOne(IndoKabupaten::className(), ['cityid' => 'kabupaten']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProvinsi0()
    {
        return $this->hasOne(IndoProvinsi::className(), ['provinceid' => 'provinsi']);
    }
}
