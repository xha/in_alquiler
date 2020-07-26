<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Accion */

$this->title = $model->id_accion;
$this->params['breadcrumbs'][] = ['label' => 'Acciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="accion-view">

    

    <p>
        <?= Html::a('<i class="fa fa-save"></i> Actualizar', ['update', 'id' => $model->id_accion], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('<i class="fa fa-close"></i> Desactivar', ['delete', 'id' => $model->id_accion], [
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
            'descripcion',
            'alias',
            'activo:boolean',
        ],
    ]) ?>

</div>
