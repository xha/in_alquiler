<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\Models\CuentasBancarias */

$this->title = 'Actualizar Cuenta Bancaria: ' . $model->id_cb;
$this->params['breadcrumbs'][] = ['label' => 'Cuentas Bancarias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_cb, 'url' => ['view', 'id' => $model->id_cb]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="cuentas-bancarias-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
