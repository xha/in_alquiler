<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "ISAL_Bancos".
 *
 * @property integer $id_banco
 * @property string $descripcion
 * @property string $codigo
 * @property integer $activo
 *
 * @property ISALCuentasBancarias[] $iSALCuentasBancarias
 */
class Bancos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ISAL_Bancos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descripcion', 'codigo'], 'required'],
            [['descripcion', 'codigo'], 'string'],
            [['activo'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_banco' => 'Id',
            'descripcion' => 'Descripción',
            'codigo' => 'Código',
            'activo' => 'Activo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCuentasBancarias()
    {
        return $this->hasMany(CuentasBancarias::className(), ['id_banco' => 'id_banco']);
    }
}
