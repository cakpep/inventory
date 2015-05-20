<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_profil".
 *
 * @property string $id
 * @property integer $user_id
 * @property string $nama
 * @property string $jenkel
 * @property string $tempat_lahir
 * @property integer $agama_id
 * @property string $tgl_lahir
 * @property string $alamat
 * @property string $no_telp
 * @property string $foto
 * @property string $created_at
 * @property integer $updated_by
 * @property string $updated_date
 *
 * @property UserAgama $agama
 * @property User $user
 */
class UserProfil extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_profil';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'agama_id', 'updated_by'], 'integer'],
            [['jenkel', 'alamat'], 'string'],
            [['tgl_lahir', 'created_at', 'updated_date'], 'safe'],
            [['nama', 'foto'], 'string', 'max' => 50],
            [['tempat_lahir'], 'string', 'max' => 30],
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
            'user_id' => 'ID User',
            'nama' => 'Nama',
            'jenkel' => 'Jenis kelamin',
            'tempat_lahir' => 'Tempat Lahir',
            'agama_id' => 'Agama',
            'tgl_lahir' => 'Tanggal Lahir',
            'alamat' => 'Alamat',
            'no_telp' => 'No Telp',
            'foto' => 'Foto',
            'created_at' => 'Created At',
            'updated_by' => 'Updated By',
            'updated_date' => 'Updated Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAgama()
    {
        return $this->hasOne(UserAgama::className(), ['id' => 'agama_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
