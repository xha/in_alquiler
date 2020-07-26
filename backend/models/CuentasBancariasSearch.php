<?php

namespace backend\Models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\Models\CuentasBancarias;

/**
 * CuentasBancariasSearch represents the model behind the search form about `backend\Models\CuentasBancarias`.
 */
class CuentasBancariasSearch extends CuentasBancarias
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_cb', 'activo'], 'integer'],
            [['nro_cuenta', 'CodVend','tipo_cuenta'], 'safe'],
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
        $query = CuentasBancarias::find();

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
            'id_cb' => $this->id_cb,
            //'id_concepto' => $this->id_concepto,
            //'id_banco' => $this->id_banco,
            'activo' => $this->activo,
        ]);

        $query->andFilterWhere(['like', 'nro_cuenta', $this->nro_cuenta])
            ->andFilterWhere(['like', 'CodVend', $this->CodVend])
            ->andFilterWhere(['like', 'tipo_cuenta', $this->tipo_cuenta]);

        return $dataProvider;
    }
}
