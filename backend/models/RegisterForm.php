<?php

namespace backend\models;
use Yii;
use yii\base\Model;
use common\models\Usuario;

class RegisterForm extends model{
    
    public $usuario;
    public $correo;
    public $cedula;
    public $repetir_clave;
    public $clave;
    public $respuesta_seguridad;
    public $id_pregunta;
    public $nombre;
    public $apellido;
    public $sexo;
    public $telefono;
    public $CodVend;
    public $isNewRecord = true;

    public function rules()
    {
        return [
            [['usuario', 'correo', 'clave', 'repetir_clave', 'cedula', 'nombre' , 'apellido', 'respuesta_seguridad', 'CodVend'], 'required', 'message' => 'Campo requerido'],
            ['usuario', 'match', 'pattern' => "/^.{3,50}$/", 'message' => 'Mínimo 3 y máximo 50 caracteres'],
            ['usuario', 'match', 'pattern' => "/^[0-9a-z]+$/i", 'message' => 'Sólo se aceptan letras y números'],
            ['correo', 'match', 'pattern' => "/^.{5,80}$/", 'message' => 'Mínimo 5 y máximo 80 caracteres'],
            ['usuario', 'usuario_existe'],
            ['correo', 'email', 'message' => 'Formato no válido'],
            ['correo', 'correo_existe'],
            ['clave', 'match', 'pattern' => "/^.{4,16}$/", 'message' => 'Mínimo 4 y máximo 16 caracteres'],
            ['repetir_clave', 'compare', 'compareAttribute' => 'clave', 'message' => 'Las claves no coinciden'],
            [['cedula', 'CodVend'], 'string', 'max' => 15],
            [['sexo'], 'string', 'max' => 1],
            [['respuesta_seguridad'], 'string', 'max' => 1000],
            [['id_pregunta'], 'exist', 'skipOnError' => true, 'targetClass' => Pregunta::className(), 'targetAttribute' => ['id_pregunta' => 'id_pregunta']],
        ];
    }
    
    public function correo_existe($attribute, $params) {
        //Buscar el email en la tabla
        $table = Usuario::find()->where("correo=:correo", [":correo" => $this->correo]);
        
        //Si el email existe mostrar el error
        if ($table->count() > 0)
        {
            $this->addError($attribute, "El email ".$this->correo." seleccionado existe");
        }
    }
 
    public function usuario_existe($attribute, $params) {
        //Buscar el username en la tabla
        $table = Usuario::find()->where("usuario=:usuario", [":usuario" => $this->usuario]);
        
        //Si el username existe mostrar el error
        if ($table->count() > 0)
        {
            $this->addError($attribute, "El usuario ".$this->usuario." seleccionado existe");
        }
    }
}