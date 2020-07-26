<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Usuario;

/* @var $this yii\web\View */
/* @var $model app\models\Rol */

$this->title = 'Cambiar Clave';

$this->params['breadcrumbs'][] = $this->title;
$id_usuario = Yii::$app->user->identity->id_usuario;
?>

<h3><?= $msg ?></h3>

<div class="cambiar-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_usuario')->hiddenInput(['value' => $id_usuario])->label(false) ?>
    
    <?= $form->field($model, 'clave_actual')->textInput(['maxlength' => true, 'type' => 'password']) ?>
    
    <?= $form->field($model, 'clave')->textInput(['maxlength' => true, 'type' => 'password']) ?>

    <?= $form->field($model, 'repetir_clave')->textInput(['maxlength' => true, 'type' => 'password']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Actualizar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>    

    <?php ActiveForm::end(); ?>
</div>