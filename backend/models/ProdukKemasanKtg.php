<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "produk_kemasan_ktg".
 *
 * @property integer $id
 * @property string $nama_kemasan
 * @property integer $created_by
 * @property string $created_date
 * @property integer $updated_by
 * @property string $updated_date
 *
 * @property ProdukKemasan[] $produkKemasans
 * @property Produk[] $produks
 */
class ProdukKemasanKtg extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'produk_kemasan_ktg';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status','created_by', 'updated_by'], 'integer'],
            [['created_date', 'updated_date'], 'safe'],
            [['nama_kemasan'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama_kemasan' => 'Nama Kemasan',
            'status' => 'Status',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
            'updated_by' => 'Updated By',
            'updated_date' => 'Updated Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProdukKemasans()
    {
        return $this->hasMany(ProdukKemasan::className(), ['kemasan_ktg_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduks()
    {
        return $this->hasMany(Produk::className(), ['id' => 'produk_id'])->viaTable('produk_kemasan', ['kemasan_ktg_id' => 'id']);
    }
}
