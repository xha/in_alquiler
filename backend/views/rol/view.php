<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Rol */

$this->title = $model->id_rol;
$this->params['breadcrumbs'][] = ['label' => 'Roles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rol-view">

    

    <p>
        <?= Html::a('<i class="fa fa-save"></i> Actualizar', ['update', 'id' => $model->id_rol], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('<i class="fa fa-close"></i> Desactivar', ['delete', 'id' => $model->id_rol], [
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
            'id_rol',
            'descripcion',
            'activo:boolean',
            'VerPem:boolean',
            'PermiteDespachar:boolean',
        ],
    ]) ?>

</div>
