<?php

namespace backend\controllers;

use Yii;
use app\models\SalesCustomer;
use app\models\SalesCutomerSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/* developed by cakpep team contact us on febrimaschut@gmail.com */

class SalesCustomerController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $searchModel = new SalesCutomerSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionDetailData($karyawan_id, $customer_id)
    {
        return $this->renderAjax('detail', [
            'model' => $this->findModel($karyawan_id, $customer_id),
        ]);
    }

    public function actionAddData()
    {
        $model = new SalesCustomer();

        if ($model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                $model->created_by=Yii::$app->user->id;
                $model->created_date=date('Y-m-d H:i:s');

            if($model->save()){
                
                  $res = array(
                        'message' => 'Data Berhasil Di Simpan.',
                        'alert'=> 'success',
                        'proses'=>'save',
                        'success' => true,
                    );
            }else{
                $res = array(
                    'message' => 'Data Gagal Di Simpan.',
                    'alert'=> 'error',
                    'proses'=>'save',
                    'success' => false,
                );         
            }
            
            return $res;
            \Yii::$app->end();
        } else {
            return $this->renderAjax('create', [
                'model' => $model,
            ]);
        }
    }

   

    public function actionUpdateData($karyawan_id, $customer_id)
    {
        $model = $this->findModel($karyawan_id, $customer_id);

        if ($model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                $model->updated_by=Yii::$app->user->id;
                $model->updated_date=date('Y-m-d H:i:s');

            if($model->save()){
                
                  $res = array(
                        'message' => 'Data Berhasil Di Update.',
                        'alert'=> 'success',
                        'proses'=> 'update',
                        'success' => true,
                    );

            }else{
                
                $res = array(
                    'message' => 'Data Gagal Di Update.',
                    'alert'=> 'error',
                    'proses'=>'update',
                    'success' => false,
                );  

            }
            
            return $res;
            \Yii::$app->end();

        } else {
            return $this->renderAjax('update', [
                'model' => $model,
            ]);
        }
    }

    public function actionDelete($karyawan_id, $customer_id)
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        if($this->findModel($karyawan_id, $customer_id)->delete()){
                
                $res = array(
                    'message' => 'Data Berhasil Di Hapus.',
                    'alert'=> 'success',
                    'proses'=> 'delete',
                    'success' => true,
                );
        }else{
                
                $res = array(
                    'message' => 'Data Gagal Di Hapus.',
                    'alert'=> 'error',
                    'proses'=> 'delete',
                    'success' => false,
                );         
        }
            
        return $res;
        \Yii::$app->end();
    }

    public function actionDeleteAll($karyawan_id, $customer_id)
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        
        $idx=explode(',', $id);

        foreach ($idx as $id) {
            $this->findModel($karyawan_id, $customer_id)->delete();
            $a=1;
        }
            
        if($a){
                
                $res = array(
                    'message' => count($idx).' Data Berhasil Di Hapus.',
                    'alert'=> 'success',
                    'proses'=> 'delete',
                    'success' => true,
                );

        }else{
                
                $res = array(
                    'message' => 'Data Gagal Di Hapus.',
                    'alert'=> 'error',
                    'proses'=> 'delete',
                    'success' => false,
                );         

        }
            
        return $res;
        \Yii::$app->end();
    }

    
    protected function findModel($karyawan_id, $customer_id)
    {
        if (($model = SalesCustomer::findOne(['karyawan_id' => $karyawan_id, 'customer_id' => $customer_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
