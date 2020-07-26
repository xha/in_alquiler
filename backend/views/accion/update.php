<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Accion */

$this->title = 'Actualizar Acción: ' . $model->id_accion;
$this->params['breadcrumbs'][] = ['label' => 'Acciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_accion, 'url' => ['view', 'id' => $model->id_accion]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="accion-update">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
