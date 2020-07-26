<?php

namespace backend\models;
use Yii;
use yii\base\Model;
use common\models\Usuario;

class RecuperarClaveForm extends model{
    
    public $usuario;
    public $correo;
    public $cedula;
    public $repetir_clave;
    public $clave;
    public $respuesta_seguridad;
    public $id_pregunta;
    public $isNewRecord = true;

    public function rules()
    {
        return [
            [['usuario', 'correo', 'clave', 'repetir_clave', 'cedula', 'respuesta_seguridad'], 'required', 'message' => 'Campo requerido'],
            ['usuario', 'match', 'pattern' => "/^.{3,50}$/", 'message' => 'Mínimo 3 y máximo 50 caracteres'],
            ['usuario', 'match', 'pattern' => "/^[0-9a-z]+$/i", 'message' => 'Sólo se aceptan letras y números'],
            ['correo', 'match', 'pattern' => "/^.{5,80}$/", 'message' => 'Mínimo 5 y máximo 80 caracteres'],
            ['correo', 'email', 'message' => 'Formato no válido'],
            ['clave', 'match', 'pattern' => "/^.{4,16}$/", 'message' => 'Mínimo 4 y máximo 16 caracteres'],
            ['repetir_clave', 'compare', 'compareAttribute' => 'clave', 'message' => 'Las claves no coinciden'],
            [['cedula'], 'number', 'max' => 999999999],
            [['respuesta_seguridad'], 'string', 'max' => 1000],
            [['id_pregunta'], 'exist', 'skipOnError' => true, 'targetClass' => Pregunta::className(), 'targetAttribute' => ['id_pregunta' => 'id_pregunta']],
        ];
    }
}