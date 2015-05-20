<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_agama".
 *
 * @property integer $id
 * @property string $name
 * @property integer $status
 * @property integer $created_by
 * @property string $created_date
 * @property integer $updated_by
 * @property string $updated_date
 *
 * @property Karyawan[] $karyawans
 * @property UserProfil[] $userProfils
 */
class Agama extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_agama';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['status', 'created_by', 'updated_by'], 'integer'],
            [['created_date', 'updated_date'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [['name'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Nama',
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
    public function getKaryawans()
    {
        return $this->hasMany(Karyawan::className(), ['agama' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserProfils()
    {
        return $this->hasMany(UserProfil::className(), ['agama_id' => 'id']);
    }
}
