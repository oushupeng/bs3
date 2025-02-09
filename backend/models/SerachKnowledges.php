<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Knowledges;

/**
 * SerachKnowledges represents the model behind the search form of `backend\models\Knowledges`.
 */
class SerachKnowledges extends Knowledges
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'knowledges_id', 'views', 'created_at', 'deleted_at'], 'integer'],
            [['title', 'content', 'image', 'created_by'], 'safe'],
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
        $query = Knowledges::find();

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
            'knowledges_id' => $this->knowledges_id,
            'views' => $this->views,
            'created_at' => $this->created_at,
            'deleted_at' => 0,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'created_by', $this->created_by]);

        return $dataProvider;
    }
}
