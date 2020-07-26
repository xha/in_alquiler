<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Accion;
use backend\models\Rol;

$this->registerJsFile('@web/general.js');
$this->registerJsFile('@web/js/rol-accion.js');
$this->registerCssFile('@web/css/general.css');
?>

<div class="rol-accion-form" style="min-height: 800px">

    <center>
        <?= Html::submitButton("<i class='fa fa-file'></i> Crear",array('class'=>'btn btn-success','onclick'=>'js:enviar_data();')); ?>
    </center>
    
    <?php $form = ActiveForm::begin(); ?>

    <label class="control-label">Rol</label>
    <?= Html::activeDropDownList($model, 'id_rol',
      ArrayHelper::map(Rol::find()->where(['activo' => '1'])->OrderBy('descripcion')->all(), 'id_rol', 'descripcion'), 
            ['prompt'=>'Seleccione','class'=>'form-control','onchange'=>'js: buscar_rol_accion()']) ?>
    <br />
    <input type="checkbox" id='seleccionar' onclick='seleccionar_todos()' /> <b>Seleccionar Todos</b>
    <div id="div_accion" style="width: 100%; height: 600px; float: left; overflow-y: scroll"></div>
    <input id="i_items" name="i_items" type="hidden" />
    
    <?php ActiveForm::end(); ?>

</div>
