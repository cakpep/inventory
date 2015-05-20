<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\KaryawanGaji;

class KaryawanGajiSearch extends KaryawanGaji
{
    
    public $srch_all;

    public function rules()
    {
        return [
            [['id', 'karyawan_id', 'insentif', 'bonus', 'komisi', 'uang_bbm', 'uang_makan', 'uang_pulsa', 'diterima_oleh', 'yang_memberi', 'status_cetak', 'created_by', 'updated_by'], 'integer'],
            [['created_date', 'updated_date'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = KaryawanGaji::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> [
                'defaultOrder' => [
                    'id' => 'DESC'
                ]
            ],
            'pagination'=> [
                'defaultPageSize' => 20
            ]
        ]);

        $this->load($params);
        if (!$this->validate()) {
            $query->where('1=0');
            return $dataProvider;
        }

        /*
        $dataProvider->query->joinWith([
            'parentGroup'=> function ($q){
                $q->from('tb_group tb_group2');  // join with tabel alias
            }
        ]);
     
        $query->andFilterWhere(['like', 'tb_group.name', $this->name]);
        $query->andFilterWhere(['like', 'tb_group2.name', $this->parent_id]);
        // SELESAI EDIT DISINI
        */

        $query->andFilterWhere([
            'id' => $this->id,
            'karyawan_id' => $this->karyawan_id,
            'insentif' => $this->insentif,
            'bonus' => $this->bonus,
            'komisi' => $this->komisi,
            'uang_bbm' => $this->uang_bbm,
            'uang_makan' => $this->uang_makan,
            'uang_pulsa' => $this->uang_pulsa,
            'diterima_oleh' => $this->diterima_oleh,
            'yang_memberi' => $this->yang_memberi,
            'status_cetak' => $this->status_cetak,
            'created_by' => $this->created_by,
            'created_date' => $this->created_date,
            'updated_by' => $this->updated_by,
            'updated_date' => $this->updated_date,
        ]);

        return $dataProvider;
    }
}
