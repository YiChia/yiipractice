<?php

namespace app\models;

use app\models\AccountInfo;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * AdminLogSearch represents the model behind the search form of `common\models\AdminLog`.
 */
class AccountInfoSearch extends AccountInfo
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {

        return [
            [['account', 'name'], 'string'],
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
        $query = AccountInfo::find();

        // add conditions that should always apply here
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'  => ['defaultOrder' => ['id' => SORT_DESC]],
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
            'account' => $this->account,
            'name' => $this->name,
        ]);

//        $query->andFilterWhere(['like', 'Type', $this->Type])
//            ->andFilterWhere(['like', 'CreatedIp', $this->CreatedIp])
//            ->andFilterWhere(['like', 'Message', $this->Message]);

        return $dataProvider;
    }
}
