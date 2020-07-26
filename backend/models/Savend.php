<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "SADEPO".
 *
 * @property string $CodVend
 * @property string $Descrip
 * @property string $Clase
 * @property integer $Activo
 * @property string $Represent
 * @property string $Direc1
 * @property string $Direc2
 * @property string $ZipCode
 * @property string $Telef
 * @property integer $Printer
 */
class Savend extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'SAVEND';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CodVend'], 'required'],
            [['CodVend', 'Descrip', 'Clase', 'Represent', 'Direc1', 'Direc2', 'ZipCode', 'Telef'], 'string'],
            [['Activo', 'Printer'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'CodVend' => 'Cod Ubic',
            'Descrip' => 'Descrip',
            'Clase' => 'Clase',
            'Activo' => 'Activo',
            'Represent' => 'Represent',
            'Direc1' => 'Direc1',
            'Direc2' => 'Direc2',
            'ZipCode' => 'Zip Code',
            'Telef' => 'Telef',
            'Printer' => 'Printer',
        ];
    }
}
