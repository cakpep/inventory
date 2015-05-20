<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "indo_kabupaten".
 *
 * @property integer $cityid
 * @property integer $provinceid
 * @property string $citycode
 * @property string $cityname
 * @property integer $recordstatus
 *
 * @property IndoProvinsi $province
 * @property Vendor[] $vendors
 */
class IndoKabupaten extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'indo_kabupaten';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['provinceid', 'cityname', 'recordstatus'], 'required'],
            [['provinceid', 'recordstatus'], 'integer'],
            [['citycode'], 'string', 'max' => 5],
            [['cityname'], 'string', 'max' => 50],
            [['provinceid', 'cityname'], 'unique', 'targetAttribute' => ['provinceid', 'cityname'], 'message' => 'The combination of Provinceid and Cityname has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cityid' => 'Cityid',
            'provinceid' => 'Provinceid',
            'citycode' => 'Citycode',
            'cityname' => 'Cityname',
            'recordstatus' => 'Recordstatus',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProvince()
    {
        return $this->hasOne(IndoProvinsi::className(), ['provinceid' => 'provinceid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVendors()
    {
        return $this->hasMany(Vendor::className(), ['kabupaten' => 'cityid']);
    }
}
