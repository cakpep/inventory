<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "karyawan_ktg".
 *
 * @property integer $id
 * @property string $nama
 * @property integer $crated_by
 * @property string $creted_date
 * @property integer $updated_by
 * @property string $updated_date
 *
 * @property Karyawan[] $karyawans
 */
class KaryawanKtg extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'karyawan_ktg';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['crated_by', 'updated_by'], 'integer'],
            [['creted_date', 'updated_date'], 'safe'],
            [['nama'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'crated_by' => 'Crated By',
            'creted_date' => 'Creted Date',
            'updated_by' => 'Updated By',
            'updated_date' => 'Updated Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKaryawans()
    {
        return $this->hasMany(Karyawan::className(), ['karyawan_ktg_id' => 'id']);
    }

    
}
