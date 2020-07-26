<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "is_usuario".
 *
 * @property integer $id_usuario
 * @property string $usuario
 * @property string $correo
 * @property string $cedula
 * @property string $clave
 * @property string $nombre
 * @property string $apellido
 * @property string $sexo
 * @property string $respuesta_seguridad
 * @property string $fecha_registro
 * @property string $telefono
 * @property integer $activo
 * @property integer $id_rol
 * @property integer $id_pregunta
 *
 * @property IsPregunta $idPregunta
 * @property IsRol $idRol
 */
class Usuario extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    
    public $clave_actual;
    
    public static function tableName()
    {
        return 'ISAL_usuario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_usuario', 'usuario', 'correo', 'cedula', 'clave', 'nombre', 'apellido', 'id_pregunta'], 'required'],
            [['id_usuario', 'activo', 'id_rol', 'id_pregunta'], 'integer'],
            [['fecha_registro'], 'safe'],
            [['usuario'], 'unique'],
            [['usuario', 'telefono'], 'string', 'max' => 20],
            [['correo', 'nombre', 'apellido'], 'string', 'max' => 100],
            [['cedula'], 'string', 'max' => 15],
            [['clave'], 'string', 'max' => 250],
            [['CodVend'], 'string', 'max' => 10],
            [['sexo'], 'string', 'max' => 1],
            [['respuesta_seguridad'], 'string', 'max' => 1000],
            [['id_pregunta'], 'exist', 'skipOnError' => true, 'targetClass' => Pregunta::className(), 'targetAttribute' => ['id_pregunta' => 'id_pregunta']],
            [['id_rol'], 'exist', 'skipOnError' => true, 'targetClass' => Rol::className(), 'targetAttribute' => ['id_rol' => 'id_rol']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_usuario' => 'Id Usuario',
            'usuario' => 'Usuario',
            'correo' => 'Correo',
            'cedula' => 'Cedula',
            'clave' => 'Clave',
            'nombre' => 'Nombre',
            'apellido' => 'Apellido',
            'sexo' => 'Sexo',
            'respuesta_seguridad' => 'Respuesta Seguridad',
            'telefono' => 'Telefono',
            'activo' => 'Activo',
            'id_rol' => 'Id Rol',
            'id_pregunta' => 'Id Pregunta',
            'CodVend' => 'Ubicación Física',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPregunta()
    {
        return $this->hasOne(Pregunta::className(), ['id_pregunta' => 'id_pregunta']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdRol()
    {
        return $this->hasOne(Rol::className(), ['id_rol' => 'id_rol']);
    }
}
