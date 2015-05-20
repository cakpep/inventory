<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "produksi_karyawan".
 *
 * @property integer $id
 * @property integer $karyawan_id
 * @property integer $produk_kemaasan_id
 * @property integer $produk_kemasan_ktg_id
 * @property string $tanggal
 * @property integer $created_by
 * @property string $created_date
 * @property integer $updated_by
 * @property string $updated_date
 *
 * @property ProdukKemasanKtg $produkKemasanKtg
 * @property Karyawan $karyawan
 * @property ProdukKemasan $produkKemaasan
 */
class ProduksiKaryawan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'produksi_karyawan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['karyawan_id', 'produk_kemaasan_id', 'produk_kemasan_ktg_id', 'tanggal'], 'required'],
            [['karyawan_id', 'produk_kemaasan_id', 'produk_kemasan_ktg_id', 'created_by', 'updated_by'], 'integer'],
            [['tanggal', 'created_date', 'updated_date'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'karyawan_id' => 'Karyawan ID',
            'produk_kemaasan_id' => 'Produk Kemaasan ID',
            'produk_kemasan_ktg_id' => 'Produk Kemasan Ktg ID',
            'tanggal' => 'Tanggal',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
            'updated_by' => 'Updated By',
            'updated_date' => 'Updated Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProdukKemasanKtg()
    {
        return $this->hasOne(ProdukKemasanKtg::className(), ['id' => 'produk_kemasan_ktg_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKaryawan()
    {
        return $this->hasOne(Karyawan::className(), ['id' => 'karyawan_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProdukKemaasan()
    {
        return $this->hasOne(ProdukKemasan::className(), ['id' => 'produk_kemaasan_id']);
    }
}
