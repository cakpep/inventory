<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "produk_bahan_ktg".
 *
 * @property integer $id
 * @property string $nama_bahan
 * @property string $ket
 * @property integer $created_by
 * @property string $created_date
 * @property integer $updated_by
 * @property string $updated_date
 *
 * @property ProdukBahan[] $produkBahans
 */
class ProdukBahanKtg extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'produk_bahan_ktg';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ket'], 'string'],
            [['created_by', 'updated_by'], 'integer'],
            [['created_date', 'updated_date'], 'safe'],
            [['nama_bahan'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama_bahan' => 'Nama Bahan',
            'ket' => 'Ket',
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
        return $this->hasMany(ProdukBahan::className(), ['produk_bahan_id' => 'id']);
    }
}
