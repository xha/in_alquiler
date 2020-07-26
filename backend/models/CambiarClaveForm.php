<?php

namespace backend\models;
use Yii;
use yii\base\Model;
use common\models\Usuario;

class CambiarClaveForm extends model{
    
    public $repetir_clave;
    public $clave;
    public $clave_actual;
    public $id_usuario;
    public $isNewRecord = true;

    public function rules()
    {
        return [
            [['id_usuario', 'clave', 'repetir_clave', 'clave_actual'], 'required', 'message' => 'Campo requerido'],
            [['clave', 'clave_actual'], 'match', 'pattern' => "/^.{4,16}$/", 'message' => 'Mínimo 4 y máximo 16 caracteres'],
            ['repetir_clave', 'compare', 'compareAttribute' => 'clave', 'message' => 'Las claves no coinciden'],
        ];
    }
    
    public function attributeLabels()
    {
        return [
            'clave' => 'Nueva Clave',
            'repetir_clave' => 'Repetir Clave',
            'clave_actual' => 'Clave Actual',
        ];
    }
}