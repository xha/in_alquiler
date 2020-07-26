<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\RolUsuario */

$this->title = $model->id_usuario;
$this->params['breadcrumbs'][] = ['label' => 'Rol Usuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rol-usuario-view">

    

    <p>
        <?= Html::a('<i class="fa fa-save"></i> Actualizar', ['update', 'id_usuario' => $model->id_usuario, 'id_rol' => $model->id_rol], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('<i class="fa fa-close"></i> Desactivar', ['delete', 'id_usuario' => $model->id_usuario, 'id_rol' => $model->id_rol], [
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
            'id_rol',
        ],
    ]) ?>

</div>
