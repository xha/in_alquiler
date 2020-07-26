<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AccionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Acciones';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="accion-index">

    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <center>
        <?= Html::a('<i class="fa fa-file"></i> Crear Acción', ['create'], ['class' => 'btn btn-success']) ?>
    </center>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions' => function ($model, $index, $widget, $grid){
            if($model->activo == 0) return ['style' => 'background-color: #FADCAC'];
        },
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'id_accion',
            'descripcion',
            'alias',
            'activo:boolean',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
