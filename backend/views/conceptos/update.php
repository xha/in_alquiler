<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\Models\Conceptos */

$this->title = 'Actualizar Concepto: ' . $model->id_concepto;
$this->params['breadcrumbs'][] = ['label' => 'Conceptos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_concepto, 'url' => ['view', 'id' => $model->id_concepto]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="conceptos-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
