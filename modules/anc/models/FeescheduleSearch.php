<?php

namespace app\modules\anc\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\anc\models\Feeschedule;

/**
 * FeescheduleSearch represents the model behind the search form about `app\modules\anc\models\Feeschedule`.
 */
class FeescheduleSearch extends Feeschedule
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fee_id', 'created_by', 'updated_by'], 'integer'],
            [['cid', 'regdate', 'regtime', 'wight', 'hieght', 'ga', 'gravida', 'lmp', 'icd10tm', 'icd9cm_1', 'icd9cm_2', 'created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Feeschedule::find();

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
            'fee_id' => $this->fee_id,
            'regdate' => $this->regdate,
            'regtime' => $this->regtime,
            'lmp' => $this->lmp,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'cid', $this->cid])
            ->andFilterWhere(['like', 'wight', $this->wight])
            ->andFilterWhere(['like', 'hieght', $this->hieght])
            ->andFilterWhere(['like', 'ga', $this->ga])
            ->andFilterWhere(['like', 'gravida', $this->gravida])
            ->andFilterWhere(['like', 'icd10tm', $this->icd10tm])
            ->andFilterWhere(['like', 'icd9cm_1', $this->icd9cm_1])
            ->andFilterWhere(['like', 'icd9cm_2', $this->icd9cm_2]);

        return $dataProvider;
    }
}
