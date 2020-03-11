<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Orders;

/**
 * SerachOrders represents the model behind the search form of `backend\models\orders`.
 */
class SerachOrders extends Orders
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'order_id', 'amount', 'telephone', 'express_id', 'courier_number', 'user_id', 'created_time', 'created_at', 'deleted_at'], 'integer'],
            [['consignee', 'address', 'payment', 'delivery', 'status', 'user_name', 'created_by'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Orders::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' =>[
                'pageSize' => '10',
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'order_id' => $this->order_id,
            'amount' => $this->amount,
            'telephone' => $this->telephone,
            'express_id' => $this->express_id,
            'courier_number' => $this->courier_number,
            'user_id' => $this->user_id,
            'created_time' => $this->created_time,
            'created_at' => $this->created_at,
            'deleted_at' => $this->deleted_at,
        ]);

        $query->andFilterWhere(['like', 'consignee', $this->consignee])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'payment', $this->payment])
            ->andFilterWhere(['like', 'delivery', $this->delivery])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'user_name', $this->user_name])
            ->andFilterWhere(['like', 'created_by', $this->created_by]);

        return $dataProvider;
    }
}
