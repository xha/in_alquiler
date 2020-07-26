<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RolAccion */

$this->title = 'Actualizar Rol Accion: ' . $model->id_accion;
$this->params['breadcrumbs'][] = ['label' => 'Rol Accions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_accion, 'url' => ['view', 'id_accion' => $model->id_accion, 'id_rol' => $model->id_rol]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="rol-accion-update">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
