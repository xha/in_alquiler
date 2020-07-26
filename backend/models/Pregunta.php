<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "is_pregunta".
 *
 * @property integer $id_pregunta
 * @property string $descripcion
 * @property boolean $activo
 *
 * @property IsUsuario[] $isUsuarios
 */
class Pregunta extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ISAL_pregunta';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descripcion'], 'required'],
            [['activo'], 'boolean'],
            [['descripcion'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_pregunta' => 'Id Pregunta',
            'descripcion' => 'Descripción',
            'activo' => 'Activo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarios()
    {
        return $this->hasMany(Usuario::className(), ['id_pregunta' => 'id_pregunta']);
    }
}
