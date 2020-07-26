<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RolAccionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Rol Accion';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rol-accion-index">

    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <center>
        <?= Html::a('<i class="fa fa-file"></i> Crear Rol Accion', ['create'], ['class' => 'btn btn-success']) ?>
    </center>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
              'attribute'=>'id_accion',
              'value'=>'idAccion.descripcion',
            ],
            [
              'attribute'=>'id_rol',
              'value'=>'idRol.descripcion',
            ],

            //['class' => 'yii\grid\ActionColumn'],
            ['class' => 'yii\grid\ActionColumn',
                'template' => '{view} {delete}',
                'urlCreator' => function ($action, $model, $key, $index) {
                    if ($action === 'view') {
                        $url = Yii::$app->urlManager->createUrl(['rol-accion/view?id_accion='.$model->id_accion.'&id_rol='.$model->id_rol]); 
                        return $url;
                    } else {
                        $url = Yii::$app->urlManager->createUrl(['rol-accion/delete?id_accion='.$model->id_accion.'&id_rol='.$model->id_rol]); 
                        return $url;
                    }
                }
                          
            ],
        ],
    ]); ?>
</div>
