<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TransaksiRetur;

class TransaksiReturSearch extends TransaksiRetur
{
    
    public $srch_all;

    public function rules()
    {
        return [
            [['transaksi_id', 'produk_id', 'jumlah', 'diskon', 'harga', 'created_by', 'updated_by'], 'integer'],
            [['tanggal', 'created_date', 'update_date'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = TransaksiRetur::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> [
                'defaultOrder' => [
                    'transaksi_id' => 'DESC',
                    'produk_id'=>'ASC',
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
            'transaksi_id' => $this->transaksi_id,
            'produk_id' => $this->produk_id,
            'tanggal' => $this->tanggal,
            'jumlah' => $this->jumlah,
            'diskon' => $this->diskon,
            'harga' => $this->harga,
            'created_by' => $this->created_by,
            'created_date' => $this->created_date,
            'updated_by' => $this->updated_by,
            'update_date' => $this->update_date,
        ]);

        return $dataProvider;
    }
}
