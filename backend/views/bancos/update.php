<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\Models\Bancos */

$this->title = 'Actualizar Banco: ' . $model->id_banco;
$this->params['breadcrumbs'][] = ['label' => 'Bancos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_banco, 'url' => ['view', 'id' => $model->id_banco]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="bancos-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
