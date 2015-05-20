<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ProdukKemasan;

class ProdukKemasanSearch extends ProdukKemasan
{
    
    public $srch_all;

    public function rules()
    {
        return [
            [['produk_id', 'kemasan_ktg_id', 'upah', 'modal', 'harga_jual', 'stok', 'retur', 'created_by', 'updated_by'], 'integer'],
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
        $query = ProdukKemasan::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> [
                'defaultOrder' => [
                    'produk_id' => 'DESC',
                    'kemasan_ktg_id'=>'ASC',
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
            'produk_id' => $this->produk_id,
            'kemasan_ktg_id' => $this->kemasan_ktg_id,
            'upah' => $this->upah,
            'modal' => $this->modal,
            'harga_jual' => $this->harga_jual,
            'stok' => $this->stok,
            'retur' => $this->retur,
            'created_by' => $this->created_by,
            'created_date' => $this->created_date,
            'updated_by' => $this->updated_by,
            'updated_date' => $this->updated_date,
        ]);

        return $dataProvider;
    }
}
