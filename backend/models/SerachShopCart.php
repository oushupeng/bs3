<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\ShopCart;

/**
 * SerachShopCart represents the model behind the search form of `backend\models\shop-cart`.
 */
class SerachShopCart extends ShopCart
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'pets_id', 'pets_name','user_id', 'pets_num', 'pets_price', 'sum','created_at', 'deleted_at'], 'integer'],
            [['user_name', 'created_by'], 'safe'],
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
        $query = ShopCart::find();

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
            'pets_id' => $this->pets_id,
            'user_id' => $this->user_id,
            'pets_num' => $this->pets_num,
            'pets_price' => $this->pets_price,
            'sum' => $this->sum,
            'created_at' => $this->created_at,
            'deleted_at' => $this->deleted_at,
        ]);

        $query->andFilterWhere(['like', 'user_name', $this->user_name])
            ->andFilterWhere(['like', 'pets_name', $this->pets_name])
            ->andFilterWhere(['like', 'created_by', $this->created_by]);

        return $dataProvider;
    }
}
