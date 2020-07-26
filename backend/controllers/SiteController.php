<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\AccessHelpers;
use common\models\Usuario;
use backend\models\LoginForm;
use backend\models\Site;
use backend\models\RegisterForm;
use backend\models\RecuperarClaveForm;
use backend\models\ActivarForm;
use backend\models\CambiarClaveForm;
use backend\models\CorreosProcesados;
use backend\models\CuentasBancarias;
use backend\models\Bancos;
use backend\models\Conceptos;
use yii\widgets\ActiveForm;
use yii\web\Response;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\db\Query;
use yii\helpers\Json;
Use app\itbz\fpdf\src\fpdf\fpdf;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['site-index'],
                'rules' => [
                    [
                        'actions' => ['site-index'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['site-logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function beforeAction($action)
    {
        if (!parent::beforeAction($action)) {
            return false;
        }

        return AccessHelpers::chequeo();
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $model = new Site;
        $mensaje = "";
        $connection = \Yii::$app->db;

        if ($model->load(Yii::$app->request->post()))
        {
            if($model->validate()) {
                $c_correo = 'avisosdecobropi@gmail.com';
                $correo = array();
                $extra = "";
                if ($model->CodVend!="") $extra = " and f.CodVend='".$model->CodVend."'";
                $arr1 = explode("/",$model->fecha_desde);
                $arr2 = explode("/",$model->fecha_hasta);
                $fecha_desde = $arr1[2].$arr1[1].$arr1[0]. " 00:00:00";
                $fecha_hasta = $arr2[2].$arr2[1].$arr2[0]. " 23:59:00";
                $falsos = "";
                $correos_errados = "";
                $contador = 0;
                
                $query = "SELECT *,i.Email,CONVERT(VARCHAR(10), f.FechaE, 105) as Fecha_Despacho,f.CodVend as Vendedor
                        from SAFACT f, SACLIE i WHERE f.TipoFac='F' and i.CodClie=f.CodClie and f.FechaE Between '$fecha_desde' and '$fecha_hasta' $extra
                        and F.NumeroD Not in (select NumeroD From ISAL_CorreosProcesados WHERE fecha between '$fecha_desde' and '$fecha_hasta')";
                $safact = $connection->createCommand($query)->queryAll();
                $total_correos = count($safact);

                for ($i=0;$i < $total_correos;$i++) {
                    $model_correos = new CorreosProcesados();
                    $titulo = $model->asunto;
                    $total_faltante = $total_correos - $contador;
                
                    if (strlen($safact[$i]['Email']) > 1) {
                        $content = "<h3><b>INSTITUTO DE PREVISIÓN SOCIAL DE LA ARMADA - IPSFA</b></h3>
                                <table border='0' class='table table-striped table-bordered' class='font-size: 32px'>
                                    <tr>
                                        <td width='7%' align='left'><b>Cliente: </b></td>
                                        <td align='left' width='60%'>".$safact[$i]['Descrip']."</td>
                                        <td align='right'><b>No. de Aviso de Cobro: </b></td>
                                        <td align='left' width='7%'>".$safact[$i]['NumeroD']."</td>
                                    </tr>
                                    <tr>
                                        <td align='left'><b>R.I.F. </b></td>
                                        <td align='left' colspan='3'>".$safact[$i]['CodClie']."</td>
                                    </tr>
                                    <tr>
                                        <td><b>Dirección: </b></td>
                                        <td>".$safact[$i]['Direc1'].$safact[$i]['Direc2']."</td>
                                        <td align='right'><b>Emisión: </b></td>
                                        <td>".$safact[$i]['Fecha_Despacho']."</td>
                                    </tr>
                                    <tr>
                                        <td colspan='4'>
                                            <table border='1' width='100%' cellpadding='0' cellspacing='0'>
                                              <thead>
                                                <tr style='font-weight: bold'>
                                                    <td width='13%' align='center'>Código</td>
                                                    <td colspan='3' align='center'>Descripción</td>
                                                    <td width='13%' align='center'>Precio</td>
                                                    <td width='13%' align='center'>IVA %</td>
                                                    <td width='13%' align='center'>Monto</td>
                                                </tr>
                                              <thead>
                                              <tbody>";

                        $query2 = "SELECT i.CodItem,i.Precio,i.Descrip1,i.Descrip2,i.TotalItem,t.MtoTax as Tasa, i.MtoTax as Impuesto
                            from SAITEMFAC i 
                            left join SATAXITF t on i.NumeroD=t.NumeroD and i.TipoFac=t.TipoFac and i.NroLinea=t.NroLinea
                            WHERE i.TipoFac='F' and i.NumeroD='".$safact[$i]['NumeroD']."'";
                        $saitemfac = $connection->createCommand($query2)->queryAll();
                        for ($y=0;$y < count($saitemfac);$y++) {
                            $content.="<tr>
                                    <td>".$saitemfac[$y]['CodItem']."</td>
                                    <td colspan='3'>".$saitemfac[$y]['Descrip1'].$saitemfac[$y]['Descrip2']."</td>
                                    <td align='right'>".number_format($saitemfac[$y]['Precio'], 2, '.', ',')."</td>
                                    <td align='right'>".number_format($saitemfac[$y]['Tasa'], 2, '.', ',')."</td>
                                    <td align='right'>".number_format($saitemfac[$y]['TotalItem'], 2, '.', ',')."</td>
                                </tr>";
                        }
                        $content.= "</tbody>
                                    <tfoot>
                                    <tr style='font-weight: bold'>
                                        <td align='center'>Sub-Total</td>
                                        <td align='center'>B. Imponible</td>
                                        <td align='center'>Exento</td>
                                        <td align='center'>IVA</td>
                                        <td align='center'>Monto Factura</td>
                                        <td align='center'>Total a Pagar</td>
                                        <td align='center'>Cancelado</td>
                                    </tr>
                                    <tr>
                                        <td align='right'>".number_format($safact[$i]['Monto'], 2, '.', ',')."</td>
                                        <td align='right'>".number_format($safact[$i]['TGravable'], 2, '.', ',')."</td>
                                        <td align='right'>".number_format($safact[$i]['TExento'], 2, '.', ',')."</td>
                                        <td align='right'>".number_format($safact[$i]['MtoTax'], 2, '.', ',')."</td>
                                        <td align='right'>".number_format($safact[$i]['MtoTotal'], 2, '.', ',')."</td>
                                        <td align='right'>".number_format($safact[$i]['MtoTotal'], 2, '.', ',')."</td>
                                        <td align='right'>".number_format($safact[$i]['CancelA'], 2, '.', ',')."</td>
                                    </tr>
                                    </tfoot>
                                    </table>
                                    </td>
                                    </tr>
                                    <tr>
                                        <td colspan='4'>
                                            Observación<br />

                                        </td>
                                    </tr>
                                </table>";
                        $content.= "<hr /><b>Elaborado por</b>: Gerencia de Empresas - IPSFA<br />
                                <h4><b>Forma de pago:</b> En taquilla del IPSFA o en depósito y/transferencia en nuestras cuentas:<br />";
                        $qry = "SELECT b.descripcion as banco,c.descripcion as concepto,cb.nro_cuenta,cb.tipo_cuenta
                            from ISAL_CuentasBancarias cb
                            inner join ISAL_Bancos b on cb.id_banco=b.id_banco
                            inner join ISAL_Conceptos c on cb.id_concepto=c.id_concepto
                            inner join SAVEND v on v.CodVend=cb.CodVend
                            WHERE cb.activo=1 and cb.CodVend='".$safact[$i]['Vendedor']."'";
                        $cuentas = $connection->createCommand($qry)->queryAll();
                        foreach ($cuentas as $cuenta)
                        {
                            $content.="Cuenta ".$cuenta["concepto"].", Tipo: ".$cuenta["tipo_cuenta"].", Banco: ".$cuenta["banco"].", Nro de cuenta: ".$cuenta["nro_cuenta"]."<br />";
                        }

                        $content.= "<b>Procedimiento de Pago:</b><br />
                                    1-. Cancelar Aviso(s) de Cobro(s) según la forma de pago de su preferencia.<br />
                                    2-. Se valida la cancelación y se emite la(s) factura(s) correspondiente(s).<br />
                                    3-. Para el Contribuyente:<br />
                                         a-. Ordinario: Retira inmediatamente la factura por taquilla<br />
                                         b-. Especial: Se emite la factura y se entrega copia para la emisión del comprobante de retención de IVA. Una vez consignado en nuestra taquilla le entregaremos original de la factura.<br /><br />
                                    <b>Disposición Transitoria: </b>
                                    Los documentos (facturas y retenciones) pueden ser enviadas y recibidas a través de correo electrónico mientras estemos en cuarentena por el covid-19.
                                </h4>";
                        
                        $transaction = $connection->beginTransaction();
                        try {
                            Yii::$app -> mailer -> compose()
                            -> setFrom($c_correo)
                            -> setTo($safact[$i]['Email'])
                            //-> setTo('sirit20@gmail.com')
                            //-> setCc($c_correo)
                            -> setSubject($titulo)
                            -> setHtmlBody($content)
                            -> send();

                            $transaction->commit();
                        } catch (\Exception $msg) {
                            $transaction->rollBack();
                            $mensaje = "<p><h3 class='text-danger'>Error: El correo cerró la conexion.</h3></br />
                                        Documentos en Total: <b>$total_correos</b>
                                        <br />Cliente con correos vacios: <b>$falsos</b>
                                        <br />Correos Enviados: <b>$contador</b>
                                        <br />Documentos Faltantes: <b>$total_faltante</b></p><br /><br />
                                        <h4>Favor volver a ejecutar el proceso</h4>";
                            //$mensaje = $msg;
                            goto salto;
                        }

                        $content = "";
                        $model_correos->id_usuario = Yii::$app->user->identity->id_usuario;
                        $model_correos->fecha = $model->fecha_desde;
                        $model_correos->TipoFac = $safact[$i]['TipoFac'];
                        $model_correos->NumeroD = $safact[$i]['NumeroD'];
                        $model_correos->correo = $safact[$i]['Email'];
                        $model_correos->CodClie = $safact[$i]['CodClie'];

                        $model_correos->save();
                        $contador++;
                    } else {
                        $falsos.= $safact[$i]['CodClie'].", ";
                    }                        
                }

                $mensaje = "<p><h3>Proceso Concluido, se enviaron: $contador correos</h3> <br /><br />Cliente con correos vacios: $falsos</p>";
            } else {
                $mensaje = "<h3>Error en los campos</h3>";
            }
        }

    salto:
        return $this->render('index', [
            'model' => $model,
            'mensaje' => $mensaje,
        ]);  
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionRegister() {
        $model = new RegisterForm;
           
        $msg = null;
        
        if ($model->load(Yii::$app->request->post()) && Yii::$app->request->isAjax)
        {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }

        if ($model->load(Yii::$app->request->post()))
        {
            if($model->validate()) {
                //Preparamos la consulta para guardar el usuario
                $table = new Usuario;
                $table->usuario = $model->usuario;
                $table->correo = $model->correo;
                $table->cedula = $model->cedula;
                $table->nombre = $model->nombre;
                $table->apellido = $model->apellido;
                $table->sexo = $model->sexo;
                $table->telefono = $model->telefono;
                $table->id_rol = 1;
                $table->id_pregunta = $model->id_pregunta;
                $table->respuesta_seguridad = $model->respuesta_seguridad;
                $table->CodVend = $model->CodVend;
                $table->activo = 0;
                $table->clave = md5("is".$model->clave);
                
                //Si el registro es guardado correctamente
                //print_r($table->getErrors());die;
                if ($table->insert(false))
                {
                    $msg = "Registro Guardado, Debe esperar que un administrador active su cuenta";
                }
                else
                {
                    $msg = "Error al guardar";
                }
            } else {
                $model->getErrors();
            }
          }

        return $this->render('register', [
            'model' => $model,
            'msg' => $msg
        ]);  
    }
    
    public function actionCambiar() {
        $model = new CambiarClaveForm;
           
        $msg = null;
        
        if ($model->load(Yii::$app->request->post()) && Yii::$app->request->isAjax)
        {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }

        if ($model->load(Yii::$app->request->post()))
        {
            if($model->validate()) {
                //Preparamos la consulta para guardar el usuario
                $table = new Usuario;
                $table->id_usuario = $model->id_usuario;
                $table->clave = md5("is".$model->clave);
                $table->clave_actual = md5("is".$model->clave_actual);
                
                $connection = \Yii::$app->db;

                $query = "UPDATE ISAL_usuario
                SET clave='".$table->clave."'
                OUTPUT INSERTED.clave
                where id_usuario='".$table->id_usuario."' and clave='".$table->clave_actual."'";
                $salida = $connection->createCommand($query)->queryOne();
        
                if ($salida['clave']!="") {
                    $msg = "Clave Actualizada";
                } else {
                    $msg = "Error al actualizar la clave";
                }
                
            } else {
                $model->getErrors();
            }
          }

        return $this->render('cambiar', [
            'model' => $model,
            'msg' => $msg
        ]);  
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionRecuperar()
    {
        $model = new RecuperarClaveForm;
           
        $msg = null;
        
        if ($model->load(Yii::$app->request->post()))
        {
            $clave = md5("is".$model->clave);
            $connection = \Yii::$app->db;

            $query = "UPDATE ISAL_usuario
            SET clave='$clave'
            where usuario='".$model->usuario."' and id_pregunta=".$model->id_pregunta." and respuesta_seguridad='".$model->respuesta_seguridad."' and correo='".$model->correo."'";
            $msg = $connection->createCommand($query)->execute();
            
            if ($msg > 0) {
                $msg = "Registro Guardado";
            } else {
                $msg = "Error al Actualizar";
            };
        }

        return $this->render('recuperar', [
            'model' => $model,
            'msg' => $msg
        ]);
    }

    public function actionActivar()
    {
        $model = new ActivarForm;
        $connection = \Yii::$app->db;
        $msg = null;
        $data = array();
        
        $query = "SELECT usuario FROM ISAL_USUARIO";
        $data1 = $connection->createCommand($query)->queryAll();

        for($i=0;$i<count($data1);$i++) {
            $data[]= $data1[$i]['usuario'];
        }
        
        if ($model->load(Yii::$app->request->post())) {
            $extra="";
            if ($model->reseteo==1) {
                $extra = md5("is123456");
                $extra = ",clave='".$extra."'";
            }

            $query = "UPDATE ISAL_USUARIO
            SET id_rol=".$model->id_rol.", CodVend='".$model->CodVend."', activo=".$model->activado." $extra
            where usuario='".$model->usuario."'";
            
            $msg = $connection->createCommand($query)->execute();
            
            if ($msg > 0) {
                $msg = "Registro Actualizado";
            } else {
                $msg = "Error al Actualizar";
            };
        }
        
        return $this->render('activar', [
            'model' => $model,
            'msg' => $msg,
            'data' => $data
        ]);
    }
    
    public function actionBuscaUsuarios() {
        $connection = \Yii::$app->db;
        
        $query = "select u.usuario, u.cedula, CONCAT(u.apellido,', ',u.nombre) as nombre,d.Descrip as ubicacion, r.descripcion as rol, u.activo
            from ISAL_Usuario u, SAVEND d, ISAL_Rol r
            WHERE u.CodVend=d.CodVend and r.id_rol=u.id_rol
            ORDER BY ubicacion,nombre";

        $pendientes = $connection->createCommand($query)->queryAll();
        //$pendientes = $comand->readAll();
        echo Json::encode($pendientes);
    }

    public function actionBuscaCuentas($codigo) {
        $connection = \Yii::$app->db;
        
        $query = "SELECT NoCuenta FROM SBBANC 
            WHERE NoCuenta like '%".$codigo."%'
            ORDER BY NoCuenta";

        $pendientes = $connection->createCommand($query)->queryAll();
        //$pendientes = $comand->readAll();
        echo Json::encode($pendientes);
    }

    function actionBuscaDatos($fecha_desde,$fecha_hasta,$codvend = "") {
        $connection = \Yii::$app->db;
        $extra = "";
        if ($codvend!="") $extra = " and f.CodVend='".$codvend."'";
        $arr1 = explode("/",$fecha_desde);
        $arr2 = explode("/",$fecha_hasta);
        $fecha_desde = $arr1[2].$arr1[1].$arr1[0]. " 00:00:00";
        $fecha_hasta = $arr2[2].$arr2[1].$arr2[0]. " 23:59:00";
        $falsos = "";
        $correos_errados = "";
        $contador = 0;
        
        $query = "SELECT *,i.Email,CONVERT(VARCHAR(10), f.FechaE, 105) as Fecha_Despacho,f.CodVend as Vendedor
                from SAFACT f, SACLIE i WHERE f.TipoFac='F' and i.CodClie=f.CodClie and f.FechaE Between '$fecha_desde' and '$fecha_hasta' $extra
                and F.NumeroD Not in (select NumeroD From ISAL_CorreosProcesados WHERE fecha between '$fecha_desde' and '$fecha_hasta')";
        $safact = $connection->createCommand($query)->queryAll();
        
        echo Json::encode($safact);
    }   
}
