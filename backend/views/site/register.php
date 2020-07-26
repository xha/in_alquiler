<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Pregunta;
use backend\models\SAVEND;

/* @var $this yii\web\View */
/* @var $model app\models\Usuario */
/* @var $form yii\widgets\ActiveForm */
$this->title = 'Registro';
?>

<div id="msj_principal"><?= $msg ?></div>

<div class="register-form">

    <?php $form = ActiveForm::begin([
        'method' => 'post',
        'id' => 'formulario',
        'enableClientValidation' => false,
        'enableAjaxValidation' => true,
    ]);
    ?>

    <?= $form->field($model, 'usuario')->textInput(['maxlength' => true,'enableAjaxValidation' => true]) ?>

    <?= $form->field($model, 'correo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cedula')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'clave')->textInput(['maxlength' => true, 'type' => 'password']) ?>

    <?= $form->field($model, 'repetir_clave')->textInput(['maxlength' => true, 'type' => 'password']) ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'apellido')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sexo')->dropDownList(['F' => 'Femenino', 'M' => 'Masculino']); ?>

    <label class="control-label">Pregunta</label>
    <?= Html::activeDropDownList($model, 'id_pregunta',
      ArrayHelper::map(Pregunta::find()->where(['activo' => '1'])->OrderBy('descripcion')->all(), 'id_pregunta', 'descripcion'), ['class'=>'form-control']) ?>

    <br />
    <?= $form->field($model, 'respuesta_seguridad')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telefono')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CodVend')->dropDownList(ArrayHelper::map(SAVEND::find()->where(['activo' => '1'])->OrderBy('Descrip')->all(), 'CodVend', 'CodVend', 'Descrip')); ?>
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<script type="text/javascript">
    window.onload = function() {
        var msj_principal = trae('msj_principal').innerHTML;
        if (msj_principal!="") {
            oculta_mensaje('msj_principal',msj_principal,1);
        }
    };
</script>