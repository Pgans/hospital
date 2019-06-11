<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Award2upload;

/**
 * Award2uploadSearch represents the model behind the search form about `app\models\Award2upload`.
 */
class Award2uploadSearch extends Award2upload
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'created_by', 'updated_by', 'dep_id'], 'integer'],
            [['award_name', 'fullname', 'ref', 'photo', 'covenant', 'receive_date', 'created_at', 'updated_at'], 'safe'],
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
        $query = Award2upload::find();

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
            'receive_date' => $this->receive_date,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'dep_id' => $this->dep_id,
        ]);

        $query->andFilterWhere(['like', 'award_name', $this->award_name])
            ->andFilterWhere(['like', 'fullname', $this->fullname])
            ->andFilterWhere(['like', 'ref', $this->ref])
            ->andFilterWhere(['like', 'photo', $this->photo])
            ->andFilterWhere(['like', 'covenant', $this->covenant]);

        return $dataProvider;
    }
}
