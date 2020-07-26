<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Users;
use app\models\Rol;
use app\models\RolUsuario;

/* @var $this yii\web\View */
/* @var $model app\models\RolUsuario */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rol-usuario-form">

    <?php $form = ActiveForm::begin(); ?>

    <label class="control-label">Usuario</label>
    <?= Html::activeDropDownList($model, 'id_usuario',
      ArrayHelper::map($pendientes, 'uid', 'name'), ['prompt'=>'Seleccione','class'=>'form-control']) ?>

    <label class="control-label">Rol</label>
    <?= Html::activeDropDownList($model, 'id_rol',
      ArrayHelper::map(Rol::find()->where(['activo' => '1'])->OrderBy('descripcion')->all(), 'id_rol', 'descripcion'), ['prompt'=>'Seleccione','class'=>'form-control']) ?>
  	<br />

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-save"></i> Crear' : '<i class="fa fa-save"></i> Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
