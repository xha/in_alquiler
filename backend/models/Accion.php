<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "is_accion".
 *
 * @property integer $id_accion
 * @property string $descripcion
 * @property boolean $activo
 *
 * @property IsRolAccion[] $isRolAccions
 * @property IsRol[] $idRols
 */
class Accion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ISAL_accion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descripcion'], 'required'],
            [['activo'], 'boolean'],
            [['descripcion','alias'], 'string', 'max' => 250],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_accion' => 'Id Accion',
            'descripcion' => 'Descripcion',
            'alias' => 'Alias',
            'activo' => 'Activo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIsRolAccions()
    {
        return $this->hasMany(IsRolAccion::className(), ['id_accion' => 'id_accion']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdRols()
    {
        return $this->hasMany(IsRol::className(), ['id_rol' => 'id_rol'])->viaTable('is_rol_accion', ['id_accion' => 'id_accion']);
    }
}
