<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\Models\CuentasBancariasSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cuentas-bancarias-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_cb') ?>

    <?= $form->field($model, 'nro_cuenta') ?>

    <?= $form->field($model, 'id_concepto') ?>

    <?= $form->field($model, 'id_banco') ?>

    <?= $form->field($model, 'CodVend') ?>

    <?php // echo $form->field($model, 'activo') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
