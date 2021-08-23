<?php

namespace app\modules\mou\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\mou\models\Mou;

/**
 * MouSearch represents the model behind the search form of `app\modules\mou\models\Mou`.
 */
class MouSearch extends Mou
{
    /**
     * {@inheritdoc}
     */
     public $q;
    public function rules()
    {
        return [
            [['id', 'department', 'created_by', 'updated_by'], 'integer'],
            [['topic', 'phone', 'date_start', 'date_end', 'results', 'level', 'updated_at', 'created_at','ref','q'], 'safe'],
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
        $query = Mou::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
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
            'department' => $this->department,
            'date_start' => $this->date_start,
            'date_end' => $this->date_end,
            'created_by' => $this->created_by,
            'update_by' => $this->updated_by,
            'updated_at' => $this->updated_at,
            'created_at' => $this->created_at,
            'expire' => $this->expire,
        ]);

        $query->andFilterWhere(['like', 'topic', $this->topic])
            ->andFilterWhere(['like', 'contact', $this->contact])
            ->andFilterWhere(['like', 'results', $this->results])
            ->andFilterWhere(['like', 'level', $this->level]);

        return $dataProvider;
    }
}
