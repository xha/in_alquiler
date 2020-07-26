<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Savend;
use backend\models\Bancos;
use backend\models\Conceptos;

/* @var $this yii\web\View */
/* @var $model backend\Models\CuentasBancarias */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cuentas-bancarias-form">

    <?php $form = ActiveForm::begin(); ?>

    <center>
        <?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-save"></i> Crear' : '<i class="fa fa-save"></i> Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </center>

    <?= $form->field($model, 'nro_cuenta')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'tipo_cuenta')->dropDownList(['Corriente' => 'Corriente', 'Ahorro' => 'Ahorro']); ?>

    <?= $form->field($model, 'id_concepto')->dropDownList(ArrayHelper::map(Conceptos::find()->where(['activo' => 1])->OrderBy('descripcion')->all(), 
        'id_concepto', 'descripcion'), ['prompt' => 'Seleccione']); ?>

    <?= $form->field($model, 'id_banco')->dropDownList(ArrayHelper::map(Bancos::find()->where(['activo' => 1])->OrderBy('descripcion')->all(), 
        'id_banco','descripcion', 'codigo'), ['prompt' => 'Seleccione']); ?>

    <?= $form->field($model, 'CodVend')->dropDownList(ArrayHelper::map(Savend::find()->where(['Activo' => 1])->OrderBy('Descrip')->all(), 
        'CodVend', 'Descrip'), ['prompt' => 'Seleccione']); ?>

    <?= $form->field($model, 'activo')->dropDownList(['1' => 'SI', '0' => 'NO']); ?>

    <?php ActiveForm::end(); ?>

</div>
