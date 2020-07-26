<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\RolAccion;

/**
 * RolAccionSearch represents the model behind the search form about `app\models\RolAccion`.
 */
class RolAccionSearch extends RolAccion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_accion', 'id_rol'], 'integer'],
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
        $query = RolAccion::find();

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
            'id_accion' => $this->id_accion,
            'id_rol' => $this->id_rol,
        ]);

        return $dataProvider;
    }
}
