<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Usuario */

$this->title = $model->id_usuario;
$this->params['breadcrumbs'][] = ['label' => 'Usuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuario-view">

    

    <p>
        <?= Html::a('<i class="fa fa-save"></i> Actualizar', ['update', 'id' => $model->id_usuario], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('<i class="fa fa-close"></i> Desactivar', ['delete', 'id' => $model->id_usuario], [
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
            'id_usuario',
            'usuario',
            'correo',
            'cedula',
            'clave',
            'nombre',
            'apellido',
            'sexo',
            'respuesta_seguridad',
            'fecha_registro',
            'telefono',
            'activo',
            'id_rol',
            'id_pregunta',
            'id_cliente',
        ],
    ]) ?>

</div>
