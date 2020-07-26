<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\RolAccion */

$this->title = $model->id_accion;
$this->params['breadcrumbs'][] = ['label' => 'Rol Accions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rol-accion-view">

    

    <p>
        <?= Html::a('<i class="fa fa-save"></i> Actualizar', ['update', 'id_accion' => $model->id_accion, 'id_rol' => $model->id_rol], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('<i class="fa fa-close"></i> Desactivar', ['delete', 'id_accion' => $model->id_accion, 'id_rol' => $model->id_rol], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Confirmar Desactivado',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_accion',
            'id_rol',
        ],
    ]) ?>

</div>
