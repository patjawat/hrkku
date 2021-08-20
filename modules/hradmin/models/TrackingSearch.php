<?php

namespace app\modules\hradmin\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\hradmin\models\Tracking;

/**
 * TrackingSearch represents the model behind the search form of `app\modules\hradmin\models\Tracking`.
 */
class TrackingSearch extends Tracking
{
    /**
     * {@inheritdoc}
     */
    public $q;

    public function rules()
    {
        return [
            [['id', 'position', 'branch_code', 'step1', 'step2', 'step3', 'step4', 'step5', 'step6', 'step7', 'step8', 'success'], 'integer'],
            [['pname', 'fname', 'lname', 'position_type', 'position_way', 'reader', 'branch', 'local_meeting_date', 'hr_getsubject_date', 'step1_comment', 'step2_comment', 'step3_comment', 'step4_comment', 'step5_comment', 'step6_comment', 'step6_date', 'step7_comment', 'step7_date', 'step8_comment','q'], 'safe'],
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
        $query = Tracking::find();

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
            'position' => $this->position,
            'branch_code' => $this->branch_code,
            'local_meeting_date' => $this->local_meeting_date,
            'hr_getsubject_date' => $this->hr_getsubject_date,
            'step1' => $this->step1,
            'step2' => $this->step2,
            'step3' => $this->step3,
            'step4' => $this->step4,
            'step5' => $this->step5,
            'step6' => $this->step6,
            'step6_date' => $this->step6_date,
            'step7' => $this->step7,
            'step7_date' => $this->step7_date,
            'step8' => $this->step8,
            'success' => $this->success,
        ]);

        $query->andFilterWhere(['like', 'pname', $this->pname])
            ->andFilterWhere(['like', 'fname', $this->fname])
            ->andFilterWhere(['like', 'lname', $this->lname])
            ->andFilterWhere(['like', 'position_type', $this->position_type])
            ->andFilterWhere(['like', 'position_way', $this->position_way])
            ->andFilterWhere(['like', 'reader', $this->reader])
            ->andFilterWhere(['like', 'branch', $this->branch])
            ->andFilterWhere(['like', 'step1_comment', $this->step1_comment])
            ->andFilterWhere(['like', 'step2_comment', $this->step2_comment])
            ->andFilterWhere(['like', 'step3_comment', $this->step3_comment])
            ->andFilterWhere(['like', 'step4_comment', $this->step4_comment])
            ->andFilterWhere(['like', 'step5_comment', $this->step5_comment])
            ->andFilterWhere(['like', 'step6_comment', $this->step6_comment])
            ->andFilterWhere(['like', 'step7_comment', $this->step7_comment])
            ->andFilterWhere(['like', 'step8_comment', $this->step8_comment]);

        return $dataProvider;
    }
}
