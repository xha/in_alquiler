<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\date\DatePicker;
use backend\models\SAVEND;

$this->title = '';
$this->registerJsFile('../../backend/web/general.js');
$this->registerJsFile('../../backend/web/js/jquery.inputmask.js');
$this->registerJsFile('../../backend/web/js/inputmask.js');
$this->registerCssFile('../../backend/web/css/general.css');
date_default_timezone_set("America/Caracas");
$fecha= time();
$fecha_2=date('d-m-Y',time());
$fecha_inicial = date("Y-m-d",strtotime($fecha_2."- 12 month"));
$fecha_final = date("Y-m-d",strtotime($fecha_2."+ 12 month"));
$fecha=date('Ymd h:m:s',$fecha);

if (Yii::$app->user->isGuest) {
    echo "<div class='central2'>
                <aside class='main-aside2'>
                    <div class='stroke2 titulo_core'>
                        Envio de correos <br />Alquiler
                    </div>
                </aside>
            </div>";
} else {
    $rol = Yii::$app->user->identity->id_rol;
    $CodVend = Yii::$app->user->identity->CodVend;
?>
<!DOCTYPE html>
<html>
<body>
	<?php $form = ActiveForm::begin(["id" => "FormIM"]); ?>
    <div class="row">
    	<div class='col-sm-4 col-md-2'>
            <label>Ubicación</label><br /><br />
            <?php 
                if ($rol=="3") {
                    echo $form->field($model, 'CodVend')->dropDownList(ArrayHelper::map(SAVEND::find()->where(['activo' => '1'])->OrderBy('Descrip')->all(), 'CodVend', 'CodVend', 'Descrip'), ['class' => 'form-control', 'prompt'=>'Todas'])->label(false);
                } else {
                    echo $form->field($model, 'CodVend')->dropDownList(ArrayHelper::map(SAVEND::find()->where(['activo' => '1', 'CodVend' => $CodVend])->OrderBy('Descrip')->all(), 'CodVend', 'CodVend', 'Descrip'), ['class' => 'form-control'])->label(false);
                }
            ?>
        </div>
        <div class="col-sm-4 col-md-2">
        	<label>Fecha desde</label><br /><br />
            <?= $form->field($model, 'fecha_desde')->widget(DatePicker::classname(), [
                'language' => 'es',
                'removeButton'=>false,
                'options' => ['class' => 'form-control fecha', 'onKeyPress' => 'solo_enteros(event)'],
                'pluginOptions' => [
                    'autoclose'=>true,
                    'format' => 'dd-mm-yyyy',
                ]
            ])->label(false);
        ?>
        </div>
        <div class="col-sm-4 col-md-2">
        	<label>Fecha hasta</label><br /><br />
            <?= $form->field($model, 'fecha_hasta')->widget(DatePicker::classname(), [
                'language' => 'es',
                'removeButton'=>false,
                'options' => ['class' => 'form-control fecha', 'onKeyPress' => 'solo_enteros(event)'],
                'pluginOptions' => [
                    'autoclose'=>true,
                    'format' => 'dd-mm-yyyy',
                ]
            ])->label(false);
        ?>
        </div>
        <div class="col-sm-12 col-md-6">
            <label>Asunto del correo</label><br /><br />
            <?= $form->field($model, 'asunto')->textInput(['maxlength' => true])->label(false); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <button class="btn btn-success" type="submit">
                <i class="fa fa-cogs"></i>
                Procesar envío de correo
            </button>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
    <div id="mensaje" class="text-danger"><?php print_r($mensaje) ?></div>
</body>
</html>
<script type="text/javascript">
	$(function () {
		$(".fecha").inputmask('99/99/9999', { numericInput: true });
	});
</script>
<?php 
    };
?>