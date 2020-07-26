<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\Models\BancosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bancos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bancos-index">

    <center>
        <?= Html::a('<i class="fa fa-file"></i> Crear Banco', ['create'], ['class' => 'btn btn-success']) ?>
    </center>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions' => function ($model, $index, $widget, $grid){
            if($model->activo == 0) return ['style' => 'background-color: #FADCAC'];
        },
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'id_banco',
            'descripcion',
            'codigo',
            'activo:boolean',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
