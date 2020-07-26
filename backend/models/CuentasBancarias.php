<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "ISAL_CuentasBancarias".
 *
 * @property integer $id_cb
 * @property string $nro_cuenta
 * @property integer $id_concepto
 * @property integer $id_banco
 * @property string $CodVend
 * @property integer $activo
 *
 * @property ISALBancos $idBanco
 * @property ISALConceptos $idConcepto
 */
class CuentasBancarias extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ISAL_CuentasBancarias';
    }

    public function beforeAction($action)
    {
        if (!parent::beforeAction($action)) {
            return false;
        }

        return AccessHelpers::chequeo();
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nro_cuenta', 'id_concepto', 'id_banco', 'CodVend'], 'required'],
            [['nro_cuenta', 'CodVend','tipo_cuenta'], 'string'],
            [['id_concepto', 'id_banco', 'activo'], 'integer'],
            [['id_banco'], 'exist', 'skipOnError' => true, 'targetClass' => Bancos::className(), 'targetAttribute' => ['id_banco' => 'id_banco']],
            [['id_concepto'], 'exist', 'skipOnError' => true, 'targetClass' => Conceptos::className(), 'targetAttribute' => ['id_concepto' => 'id_concepto']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_cb' => 'Id',
            'nro_cuenta' => 'Nro. Cuenta',
            'tipo_cuenta' => 'Tipo Cuenta',
            'id_concepto' => 'Concepto',
            'id_banco' => 'Banco',
            'CodVend' => 'Ubicación',
            'activo' => 'Activo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdBanco()
    {
        return $this->hasOne(Bancos::className(), ['id_banco' => 'id_banco']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdConcepto()
    {
        return $this->hasOne(Conceptos::className(), ['id_concepto' => 'id_concepto']);
    }

    public function getCodVend()
    {
        return $this->hasOne(Savend::className(), ['CodVend' => 'CodVend']);
    }
}
