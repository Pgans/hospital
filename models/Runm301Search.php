<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Runm301;

/**
 * Runm301Search represents the model behind the search form about `app\models\Runm301`.
 */
class Runm301Search extends Runm301
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bib', 'fullname', 'tel', 'fname', 'lname', 'category', 'serial', 'size', 'shirth'], 'safe'],
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
        $query = Runm301::find();

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
        $query->andFilterWhere(['like', 'bib', $this->bib])
            ->andFilterWhere(['like', 'fullname', $this->fullname])
            ->andFilterWhere(['like', 'tel', $this->tel])
            ->andFilterWhere(['like', 'fname', $this->fname])
            ->andFilterWhere(['like', 'lname', $this->lname])
            ->andFilterWhere(['like', 'category', $this->category])
            ->andFilterWhere(['like', 'serial', $this->serial])
            ->andFilterWhere(['like', 'size', $this->size])
            ->andFilterWhere(['like', 'shirth', $this->shirth]);

        return $dataProvider;
    }
}
