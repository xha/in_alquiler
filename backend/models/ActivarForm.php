<?php

namespace backend\models;
use Yii;
use yii\base\Model;
use common\models\Usuario;
use backend\models\Rol;

class ActivarForm extends model{
    
    public $usuario;
    public $id_rol;
    public $reseteo;
    public $CodVend;
    public $activado = true;
    public $isNewRecord = true;

    public function rules()
    {
        return [
            [['usuario', 'id_rol', 'activado','reseteo'], 'required', 'message' => 'Campo requerido'],
            [['id_rol'], 'exist', 'skipOnError' => true, 'targetClass' => Rol::className(), 'targetAttribute' => ['id_rol' => 'id_rol']],
            [['CodVend'], 'string'],
            [['reseteo'], 'boolean'],
        ];
    }
    
    public function attributeLabels()
    {
        return [
            'usuario' => 'Usuario',
            'id_rol' => 'Rol',
            'reseteo' => 'Resetear Clave (por defecto 123456)',
        ];
    }
}