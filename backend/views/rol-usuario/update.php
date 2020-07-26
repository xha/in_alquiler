<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RolUsuario */

$this->title = 'Actualizar Rol Usuario: ' . $model->id_usuario;
$this->params['breadcrumbs'][] = ['label' => 'Rol Usuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_usuario, 'url' => ['view', 'id_usuario' => $model->id_usuario, 'id_rol' => $model->id_rol]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="rol-usuario-update">

    

    <?= $this->render('_form', [
        'model' => $model,
        'pendientes' => $pendientes,
    ]) ?>

</div>
