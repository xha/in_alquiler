<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Rol */

$this->title = 'Crear Rol';
$this->params['breadcrumbs'][] = ['label' => 'Rols', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rol-create">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
