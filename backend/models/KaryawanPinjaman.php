<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "karyawan_pinjaman".
 *
 * @property integer $id
 * @property integer $karyawan_id
 * @property integer $pinjam_jumlah
 * @property string $pinjam_tgl
 * @property integer $status
 * @property integer $created_by
 * @property string $created_date
 * @property integer $updated_by
 * @property string $updated_date
 *
 * @property Karyawan $karyawan
 */
class KaryawanPinjaman extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'karyawan_pinjaman';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['karyawan_id', 'pinjam_jumlah', 'status', 'created_by', 'updated_by'], 'integer'],
            [['pinjam_tgl', 'created_date', 'updated_date'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'karyawan_id' => 'Nama Karyawan',
            'pinjam_jumlah' => 'Jumlah Pinjam',
            'pinjam_tgl' => 'Tanggal Pinjam',
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
    public function getKaryawan()
    {
        return $this->hasOne(Karyawan::className(), ['id' => 'karyawan_id']);
    }
}
