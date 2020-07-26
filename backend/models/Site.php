<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use common\models\Usuario;

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
class Site extends model
{
    public $fecha_desde;
    public $fecha_hasta;
    public $asunto;
    public $CodVend;

    public function rules()
    {
        return [
            [['fecha_desde', 'fecha_hasta','asunto'], 'required'],
            [['fecha_desde','fecha_hasta','CodVend'], 'string', 'max' => 12],
            [['asunto',], 'string', 'max' => 80],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'fecha_desde' => 'Fecha Desde',
            'fecha_hasta' => 'Fecha Hasta',
            'CodVend' => 'Ubicación',
            'asunto' => 'Asunto del correo',
        ];
    }
}
