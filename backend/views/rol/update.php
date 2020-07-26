<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Rol */

$this->title = 'Actualizar Rol: ' . $model->id_rol;
$this->params['breadcrumbs'][] = ['label' => 'Rols', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_rol, 'url' => ['view', 'id' => $model->id_rol]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="rol-update">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
