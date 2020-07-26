<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "ISAL_CorreosProcesados".
 *
 * @property string $id_cp
 * @property integer $id_usuario
 * @property string $fecha
 * @property string $TipoFac
 * @property string $NumeroD
 * @property string $correo
 * @property string $CodClie
 */
class CorreosProcesados extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ISAL_CorreosProcesados';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_usuario', 'fecha', 'TipoFac', 'NumeroD', 'correo', 'CodClie'], 'required'],
            [['id_cp'], 'number'],
            [['id_usuario'], 'integer'],
            [['fecha'], 'safe'],
            [['TipoFac', 'NumeroD', 'correo', 'CodClie'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_cp' => 'Id Cp',
            'id_usuario' => 'Id Usuario',
            'fecha' => 'Fecha',
            'TipoFac' => 'Tipo Fac',
            'NumeroD' => 'Numero D',
            'correo' => 'Correo',
            'CodClie' => 'Cod Clie',
        ];
    }
}
