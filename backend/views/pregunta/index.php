<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PreguntaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Preguntas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pregunta-index">

    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <center>
        <?= Html::a('<i class="fa fa-file"></i> Create Pregunta', ['create'], ['class' => 'btn btn-success']) ?>
    </center>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions' => function ($model, $index, $widget, $grid){
            if($model->activo == 0) return ['style' => 'background-color: #FADCAC'];
        },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_pregunta',
            'descripcion:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
