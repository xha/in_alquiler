<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\date\DatePicker;
use backend\models\SAVEND;

$this->title = 'Clientes sin correos';
?>
<!DOCTYPE html>
<head>
    <style type="text/css">
        table.dataTable thead {
            background-color:#3C8DBC;
            color: #fff;
        }
    </style>
</head>
<html>
<body>
	<?php $form = ActiveForm::begin(["id" => "FormIM"]); ?>
    <div class="mt-2" width="98%">
        <table class="table" id="tabla"></table>
    </div>
</body>
</html>
<script type="text/javascript">
	$(function () {
		buscar_datos()
	});

    function buscar_datos() {
        let tabla = $("#tabla")[0];
        tabla.innerHTML = "";

        $.getJSON('busca-nocorreos',{},function(data){
            var campos = Array();
            if (data!="") {
                $("#tabla").html("");
                $("#tabla").DataTable({
                    destroy: true,
                    data: data,
                    columns: [
                        { data: "CodClie", title: "Código/Rif" },
                        { data: "RazonSocial", title: "Razón Social/Nombre" },
                        { data: "CodLocal", title: "Local" },
                        { data: "DetalleLocal", title: "Detalle" },
                        { data: "Direc1", title: "Dirección" },
                        { data: "Email", title: "Email" },
                    ]
                });
            }
        });
    }
</script>
