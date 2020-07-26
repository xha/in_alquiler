<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Pregunta;
use backend\models\Rol;

/* @var $this yii\web\View */
/* @var $model app\models\Usuario */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuario-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_usuario')->textInput(['readonly' => true]) ?>

    <?= $form->field($model, 'usuario')->textInput(['maxlength' => true,'enableAjaxValidation' => true]) ?>

    <?= $form->field($model, 'correo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cedula')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'clave')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'apellido')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sexo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'respuesta_seguridad')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fecha_registro')->textInput() ?>

    <?= $form->field($model, 'telefono')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'activo')->dropDownList(['1' => 'SI', '0' => 'NO']); ?>

    <label class="control-label">Rol</label>
    <?= Html::activeDropDownList($model, 'id_rol',
      ArrayHelper::map(Rol::find()->where(['activo' => '1'])->OrderBy('descripcion')->all(), 'id_rol', 'descripcion'), ['class'=>'form-control']) ?>

    <label class="control-label">Pregunta</label>
    <?= Html::activeDropDownList($model, 'id_pregunta',
      ArrayHelper::map(Pregunta::find()->where(['activo' => '1'])->OrderBy('descripcion')->all(), 'id_pregunta', 'descripcion'), ['class'=>'form-control']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-save"></i> Crear' : '<i class="fa fa-save"></i> Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
