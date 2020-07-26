<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "is_rol".
 *
 * @property integer $id_rol
 * @property string $descripcion
 * @property integer $activo
 */
class Rol extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ISAL_rol';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descripcion'], 'required'],
            [['activo'], 'integer'],
            [['descripcion'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_rol' => 'Id Rol',
            'descripcion' => 'Descripción',
            'activo' => 'Activo',

        ];
    }
}
