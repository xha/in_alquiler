<?php

namespace backend\controllers;

use Yii;
use backend\models\RolAccion;
use backend\models\RolAccionSearch;
use common\models\AccessHelpers;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;

/**
 * RolAccionController implements the CRUD actions for RolAccion model.
 */
class RolAccionController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
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
     * Lists all RolAccion models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RolAccionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single RolAccion model.
     * @param integer $id_accion
     * @param integer $id_rol
     * @return mixed
     */
    public function actionView($id_accion, $id_rol)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_accion, $id_rol),
        ]);
    }

    /**
     * Creates a new RolAccion model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new RolAccion();
        $connection = \Yii::$app->db;

        if ($model->load(Yii::$app->request->post())) {
            $detalle = explode("#",$_POST['i_items']);  
            
            $query = "DELETE FROM ISAL_RolAccion WHERE id_rol=".$model->id_rol;
            $connection->createCommand($query)->query();
            for ($i=0;$i < count($detalle) - 1;$i++) {
                $query = "INSERT INTO ISAL_RolAccion(id_rol,id_accion,modifica) 
                        VALUES (".$model->id_rol.",".$detalle[$i].",1)";
                $connection->createCommand($query)->query();
            }
            
            return $this->redirect(['index', 'id_rol' => $model->id_rol]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing RolAccion model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id_accion
     * @param integer $id_rol
     * @return mixed
     */
    public function actionUpdate($id_accion = null, $id_rol)
    {
        $model = new RolAccion();
        $connection = \Yii::$app->db;

        if ($model->load(Yii::$app->request->post())) {
            $detalle = explode("#",$_POST['i_items']);  
            
            $query = "DELETE FROM ISAL_RolAccion WHERE id_rol=".$model->id_rol;
            $connection->createCommand($query)->query();
            for ($i=0;$i < count($detalle) - 1;$i++) {
                $query = "INSERT INTO ISAL_RolAccion(id_rol,id_accion,modifica) 
                        VALUES (".$model->id_rol.",".$detalle[$i].",1)";
                $connection->createCommand($query)->query();
            }
            
            return $this->redirect(['index', 'id_rol' => $model->id_rol]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing RolAccion model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id_accion
     * @param integer $id_rol
     * @return mixed
     */
    public function actionDelete($id_accion, $id_rol)
    {
        $this->findModel($id_accion, $id_rol)->delete();

        return $this->redirect(['index']);
    }

    public function actionBuscarAccion($rol = null) {
        $extra="";
        if ($rol>0) {
            $query = "select a.id_accion, a.descripcion, a.alias, r.id_rol
                from ISAL_Accion a
                left join ISAL_RolAccion r on a.id_accion=r.id_accion
                WHERE r.id_rol=$rol
                ORDER BY a.descripcion";
        } else {
            $query = "select id_accion, alias, descripcion
                from ISAL_Accion 
                WHERE activo=1
                ORDER BY descripcion";
        }
        $connection = \Yii::$app->db;

        $pendientes = $connection->createCommand($query)->queryAll();
        //$pendientes = $comand->readAll();
        echo Json::encode($pendientes);
    }

    protected function findModel($id_accion, $id_rol)
    {
        if (($model = RolAccion::findOne(['id_accion' => $id_accion, 'id_rol' => $id_rol])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

