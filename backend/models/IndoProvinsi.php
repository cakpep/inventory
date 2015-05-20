<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "indo_provinsi".
 *
 * @property integer $provinceid
 * @property string $provincecode
 * @property string $provincename
 * @property integer $recordstatus
 *
 * @property IndoKabupaten[] $indoKabupatens
 * @property Vendor[] $vendors
 */
class IndoProvinsi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'indo_provinsi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['provincename', 'recordstatus'], 'required'],
            [['recordstatus'], 'integer'],
            [['provincecode'], 'string', 'max' => 5],
            [['provincename'], 'string', 'max' => 100],
            [['provincename'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'provinceid' => 'Provinceid',
            'provincecode' => 'Provincecode',
            'provincename' => 'Provincename',
            'recordstatus' => 'Recordstatus',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIndoKabupatens()
    {
        return $this->hasMany(IndoKabupaten::className(), ['provinceid' => 'provinceid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVendors()
    {
        return $this->hasMany(Vendor::className(), ['provinsi' => 'provinceid']);
    }
}
