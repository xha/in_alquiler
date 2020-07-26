<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Accion;

/**
 * AccionSearch represents the model behind the search form about `app\models\Accion`.
 */
class AccionSearch extends Accion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_accion'], 'integer'],
            [['descripcion','alias'], 'safe'],
            [['activo'], 'boolean'],
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
        $query = Accion::find();

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
            'activo' => $this->activo,
        ]);

        $query->andFilterWhere([
            'like', 'descripcion', $this->descripcion,
            'like', 'alias', $this->alias
        ]);

        return $dataProvider;
    }
}
