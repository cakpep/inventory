<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "karyawan_gaji".
 *
 * @property integer $karyawan_id
 * @property integer $insentif
 * @property integer $bonus
 * @property integer $komisi
 * @property integer $uang_bbm
 * @property integer $uang_makan
 * @property integer $uang_pulsa
 * @property integer $diterima_oleh
 * @property integer $yang_memberi
 * @property integer $status_cetak
 * @property integer $created_by
 * @property string $created_date
 * @property integer $updated_by
 * @property string $updated_date
 *
 * @property Karyawan $karyawan
 */
class KaryawanGaji extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'karyawan_gaji';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['karyawan_id', 'insentif', 'bonus', 'komisi', 'uang_bbm', 'uang_makan', 'uang_pulsa', 'diterima_oleh', 'yang_memberi', 'status_cetak', 'created_by', 'updated_by'], 'integer'],
            [['created_date', 'updated_date'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'karyawan_id' => 'Nama Karyawan',
            'insentif' => 'Insentif',
            'bonus' => 'Bonus',
            'komisi' => 'Komisi',
            'uang_bbm' => 'Uang BBM',
            'uang_makan' => 'Uang Makan',
            'uang_pulsa' => 'Uang Pulsa',
            'diterima_oleh' => 'Diterima Oleh',
            'yang_memberi' => 'Yang Memberi',
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
    public function getKaryawan()
    {
        return $this->hasOne(Karyawan::className(), ['id' => 'karyawan_id']);
    }
}
