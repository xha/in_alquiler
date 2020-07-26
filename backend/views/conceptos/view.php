<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\Models\Conceptos */

$this->title = $model->id_concepto;
$this->params['breadcrumbs'][] = ['label' => 'Conceptos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="conceptos-view">

    <p>
        <?= Html::a('<i class="fa fa-save"></i> Actualizar', ['update', 'id' => $model->id_concepto], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('<i class="fa fa-close"></i> Desactivar', ['delete', 'id' => $model->id_concepto], [
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
            'id_concepto',
            'descripcion',
            'activo:boolean',
        ],
    ]) ?>

</div>
