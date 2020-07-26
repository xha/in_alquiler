<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\Models\Bancos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bancos-form">

    <?php $form = ActiveForm::begin(); ?>

    <center>
        <?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-save"></i> Crear' : '<i class="fa fa-save"></i> Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </center>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => 200]) ?>

    <?= $form->field($model, 'codigo')->textInput(['maxlength' => 5]) ?>

    <?= $form->field($model, 'activo')->dropDownList(['1' => 'SI', '0' => 'NO']); ?>

    <?php ActiveForm::end(); ?>

</div>
