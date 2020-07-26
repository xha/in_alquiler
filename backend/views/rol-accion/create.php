<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\RolAccion */

$this->title = 'Crear Rol Accion';
$this->params['breadcrumbs'][] = ['label' => 'Rol Accions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rol-accion-create">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
