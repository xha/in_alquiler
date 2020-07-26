<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RolUsuarioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Rol Usuarios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rol-usuario-index">

    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <center>
        <?= Html::a('<i class="fa fa-file"></i> Crear Rol Usuario', ['create'], ['class' => 'btn btn-success']) ?>
    </center>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
              'attribute'=>'id_usuario',
              'value'=>'idUsers.name',
            ],
            [
              'attribute'=>'id_rol',
              'value'=>'idRol.descripcion',
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
