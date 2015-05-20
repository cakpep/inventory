<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ProduksiKaryawan;

class ProduksiKaryawanSearch extends ProduksiKaryawan
{
    
    public $srch_all;

    public function rules()
    {
        return [
            [['id', 'karyawan_id', 'produk_kemaasan_id', 'created_by', 'updated_by'], 'integer'],
            [['tanggal', 'created_date', 'updated_date'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = ProduksiKaryawan::find();

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
            'produk_kemaasan_id' => $this->produk_kemaasan_id,
            'tanggal' => $this->tanggal,
            'created_by' => $this->created_by,
            'created_date' => $this->created_date,
            'updated_by' => $this->updated_by,
            'updated_date' => $this->updated_date,
        ]);

        return $dataProvider;
    }
}
