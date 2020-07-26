<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\Models\CuentasBancarias */

$this->title = $model->id_cb;
$this->params['breadcrumbs'][] = ['label' => 'Cuentas Bancarias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cuentas-bancarias-view">

    <p>
        <?= Html::a('<i class="fa fa-save"></i> Actualizar', ['update', 'id' => $model->id_cb], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('<i class="fa fa-close"></i> Desactivar', ['delete', 'id' => $model->id_cb], [
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
            'id_cb',
            'nro_cuenta',
            'tipo_cuenta',
            'id_concepto',
            'id_banco',
            'CodVend',
            'activo:boolean',
        ],
    ]) ?>

</div>
