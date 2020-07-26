<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Savend;
use backend\models\Bancos;
use backend\models\Conceptos;
use yii\helpers\Url;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model backend\Models\CuentasBancarias */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cuentas-bancarias-form">

    <?php $form = ActiveForm::begin(); ?>

    <center>
        <?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-save"></i> Crear' : '<i class="fa fa-save"></i> Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </center>
    <br />
    <label class="control-label">Banco</label><br /><br />
    <?= 
        $form->field($model, 'id_banco')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(Bancos::find()->where(['activo' => 1])->OrderBy('descripcion')->all(),
                'id_banco',
                function($model) {
                    return $model['codigo'].' - '.$model['descripcion'];
                }),
            'options' => [
                'placeholder' => 'Seleccione el Banco',
                'class' => 'form-control',
                'onchange'=>'js:buscar_cuenta();'
            ],
        ]);
    ?>

    <?= $form->field($model, 'tipo_cuenta')->dropDownList(['Corriente' => 'Corriente', 'Ahorro' => 'Ahorro']); ?>

    <?= $form->field($model, 'nro_cuenta')->dropDownList([]); ?>

    <?= $form->field($model, 'CodVend')->dropDownList(ArrayHelper::map(Savend::find()->where(['Activo' => 1])->OrderBy('Descrip')->all(), 
        'CodVend', 'Descrip'), ['prompt' => 'Seleccione']); ?>

    <?= $form->field($model, 'id_concepto')->dropDownList(ArrayHelper::map(Conceptos::find()->where(['activo' => 1])->OrderBy('descripcion')->all(), 
        'id_concepto', 'descripcion'), ['prompt' => 'Seleccione']); ?>
    

    <?= $form->field($model, 'activo')->dropDownList(['1' => 'SI', '0' => 'NO']); ?>

    <?php ActiveForm::end(); ?>

</div>
<script type="text/javascript">
    function buscar_cuenta() {
        $("#cuentasbancarias-nro_cuenta").empty();
        let banco = $("#cuentasbancarias-id_banco")[0];
        let arreglo = banco.options[banco.selectedIndex].text.split(" - ");

        $.getJSON('../site/busca-cuentas',{codigo : arreglo[0]},function(datos){
            if (datos.length > 0) {
                for (var i=0; i < datos.length; i++) {
                    var newOption = new Option(datos[i].NoCuenta, datos[i].NoCuenta, false, false);
                    $('#cuentasbancarias-nro_cuenta').append(newOption).trigger('change');    
                }
                
            }
        });
    }
</script>