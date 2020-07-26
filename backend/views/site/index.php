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
    <div class="row my-2">
        <div class="col-sm-3">
            <button class="btn btn-success" type="submit">
                <i class="fa fa-cogs"></i>
                Procesar envío de correo
            </button>
        </div>
        <div class="col-sm-3">
            <label class="btn btn-primary" onclick="buscar_datos()">
                <i class="fa fa-search"></i>
                Vista Previa
            </label>
        </div>
        <div class="col-sm-5"></div>
        <div class="col-sm-1">
            <img id='img_busqueda' style='visibility: hidden' src='../../../img/preloader.gif' />
        </div>
    </div>
    <?php ActiveForm::end(); ?>
    <div id="mensaje" class="text-danger"><?php print_r($mensaje) ?></div>
    <br />
    <div class="table-responsive mt-2" id="div_table" style="visibility: hidden">
        <table class="table" width="100%">
            <thead class="bg-primary">
                <tr>
                    <th>#</th>
                    <th>Factura</th>
                    <th>Rif</th>
                    <th>Cliente</th>
                    <th>Correo</th>
                    <th>Info</th>
                    <th>Fecha</th>
                    <th>Ubicación</th>
                    <th>Concepto</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody id="tabla"></tbody>
        </table>
    </div>
</body>
</html>
<script type="text/javascript">
	$(function () {
		$(".fecha").inputmask('99/99/9999', { numericInput: true });
	});

    function buscar_datos() {
        let fecha_desde = $("#site-fecha_desde").val();
        let fecha_hasta = $("#site-fecha_hasta").val();
        let codvend = $("#site-codvend").val();
        let img = $('#img_busqueda')[0];
        let div_table = $('#div_table')[0];
        let tabla = $("#tabla")[0];
        tabla.innerHTML = "";

        div_table.style.visibility = "visible";
        img.style.visibility = "visible";
        if ((fecha_desde!="") && (fecha_hasta)) {
            $.getJSON('site/busca-datos',{fecha_desde : fecha_desde, fecha_hasta : fecha_hasta, codvend : codvend},function(data){
                var campos = Array();
                if (data!="") {
                    for (i = 0; i < data.length; i++) {
                        campos.length = 0;
                        campos.push(i+1);
                        campos.push(data[i].NumeroD);
                        campos.push(data[i].CodClie);
                        campos.push(data[i].Descrip);
                        if (data[i].Email==null) data[i].Email="";
                        campos.push(data[i].Email);
                        if (data[i].Notas2==null) data[i].Notas2="";
                        campos.push(data[i].Notas2);
                        campos.push(data[i].Fecha_Despacho);
                        campos.push(data[i].Vendedor);
                        if (data[i].Notas1==null) data[i].Notas1="";
                        campos.push(data[i].Notas1);
                        campos.push(parseFloat(data[i].MtoTotal));
                        tabla.appendChild(add_filas(campos, 'td','','',9));
                    }
                }
                img.style.visibility = "hidden";
            });
        }        
    }
</script>
<?php 
    };
?>