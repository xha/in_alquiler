<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\Models\CuentasBancariasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cuentas Bancarias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cuentas-bancarias-index">

    <center>
        <?= Html::a('<i class="fa fa-file"></i> Crear Cuenta Bancaria', ['create'], ['class' => 'btn btn-success']) ?>
    </center>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions' => function ($model, $index, $widget, $grid){
            if($model->activo == 0) return ['style' => 'background-color: #FADCAC'];
        },
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'id_cb',
            'nro_cuenta',
            'tipo_cuenta',
            [
              'attribute'=>'id_concepto',
              'value'=>'idConcepto.descripcion',
            ],
            [
              'attribute'=>'id_banco',
              'value'=>'idBanco.descripcion',
            ],
            [
              'attribute'=>'CodVend',
              'value'=>'codVend.Descrip',
            ],
            'activo:boolean',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
