<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Pets;

/**
 * SerachPets represents the model behind the search form of `backend\models\Pets`.
 */
class SerachPets extends Pets
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'pets_id','price', 'stock','sales', 'created_at', 'deleted_at'], 'integer'],
            [['name', 'category', 'content', 'picture', 'created_by'], 'safe'],
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
        $query = Pets::find();

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
            'pets_id' => $this->pets_id,
            'price' => $this->price,
            'stock' => $this->stock ,
            'sales' => $this->sales,
            'created_at' => $this->created_at,
            'deleted_at' => 0,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'category', $this->category])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'picture', $this->picture])
            ->andFilterWhere(['like', 'created_by', $this->created_by]);

        return $dataProvider;
    }


    public function search2($params)
    {
        $query = Pets::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query->where(['!=', 'deleted_at' ,0]),
            'pagination' =>[
                'pageSize' => '10',
            ],
            'sort' => ['defaultOrder' => ['deleted_at' => SORT_DESC]],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'pets_id' => $this->pets_id,
            'price' => $this->price,
            'stock' => $this->stock ,
            'sales' => $this->sales,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'category', $this->category])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'picture', $this->picture])
            ->andFilterWhere(['like', 'created_by', $this->created_by]);

        return $dataProvider;
    }

}
