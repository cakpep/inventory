<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sales_customer".
 *
 * @property integer $karyawan_id
 * @property integer $customer_id
 *
 * @property Karyawan $karyawan
 * @property Customer $customer
 */
class SalesCustomer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sales_customer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['karyawan_id', 'customer_id'], 'required'],
            [['karyawan_id', 'customer_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'karyawan_id' => 'Nama Karyawan',
            'customer_id' => 'Nama Customer',
        ];
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
    public function getCustomer()
    {
        return $this->hasOne(Customer::className(), ['id' => 'customer_id']);
    }
}
