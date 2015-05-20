<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Transaksi;

class TransaksiSearch extends Transaksi
{
    
    public $srch_all;

    public function rules()
    {
        return [
            [['id', 'customer_id', 'menyerahkan_oleh', 'created_by', 'updated_by'], 'integer'],
            [['no_faktur', 'tanggal_transaksi', 'tanggal_bayar', 'status_lunas', 'diterima_oleh', 'status_cetak', 'created_date', 'updated_date'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Transaksi::find();

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
            'customer_id' => $this->customer_id,
            'tanggal_transaksi' => $this->tanggal_transaksi,
            'tanggal_bayar' => $this->tanggal_bayar,
            'menyerahkan_oleh' => $this->menyerahkan_oleh,
            'created_by' => $this->created_by,
            'created_date' => $this->created_date,
            'updated_by' => $this->updated_by,
            'updated_date' => $this->updated_date,
        ]);

        $query->andFilterWhere(['like', 'no_faktur', $this->no_faktur])
            ->andFilterWhere(['like', 'status_lunas', $this->status_lunas])
            ->andFilterWhere(['like', 'diterima_oleh', $this->diterima_oleh])
            ->andFilterWhere(['like', 'status_cetak', $this->status_cetak]);

        return $dataProvider;
    }
}
