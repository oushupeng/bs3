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
            [['id', 'pets_id','user_id', 'pets_num', 'pets_price', 'sum','created_at', 'deleted_at'], 'integer'],
            [['user_name', 'pets_category', 'created_by'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
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


        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' =>[
                'pageSize' => '10',
            ],
            'sort' => ['defaultOrder' => ['created_at' => SORT_DESC]],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // $query->where('0=1');
            return $dataProvider;
        }

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
            ->andFilterWhere(['like', 'pets_category', $this->pets_category])
            ->andFilterWhere(['like', 'created_by', $this->created_by]);

        return $dataProvider;
    }
}
