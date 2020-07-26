<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pregunta */

$this->title = 'Actualizar Pregunta: ' . $model->id_pregunta;
$this->params['breadcrumbs'][] = ['label' => 'Preguntas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_pregunta, 'url' => ['view', 'id' => $model->id_pregunta]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="pregunta-update">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
