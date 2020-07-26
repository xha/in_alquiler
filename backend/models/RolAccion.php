<?php

namespace backend\models;
use backend\models\Accion;
use backend\models\Rol;

use Yii;

/**
 * This is the model class for table "is_rol_accion".
 *
 * @property integer $id_accion
 * @property integer $id_rol
 *
 * @property IsRol $idRol
 * @property IsAccion $idAccion
 */
class RolAccion extends \yii\db\ActiveRecord
{

    public $acciones;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ISAL_rolaccion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_accion', 'id_rol'], 'required'],
            [['id_accion', 'id_rol'], 'integer'],
            [['acciones'], 'safe'],
            [['id_rol'], 'exist', 'skipOnError' => true, 'targetClass' => Rol::className(), 'targetAttribute' => ['id_rol' => 'id_rol']],
            [['id_accion'], 'exist', 'skipOnError' => true, 'targetClass' => Accion::className(), 'targetAttribute' => ['id_accion' => 'id_accion']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_accion' => 'Id Accion',
            'id_rol' => 'Id Rol',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdRol()
    {
        return $this->hasOne(Rol::className(), ['id_rol' => 'id_rol']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdAccion()
    {
        return $this->hasOne(Accion::className(), ['id_accion' => 'id_accion']);
    }
}
