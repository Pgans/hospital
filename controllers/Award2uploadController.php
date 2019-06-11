<?php

namespace app\controllers;

use Yii;
use app\models\Award2upload;
use app\models\Award2uploadSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\BaseFileHelper;
use yii\helpers\Json;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\helpers\html;

/* เพิ่มคำสั่ง 3 บรรทัดต่อจากนี้ลงไป */
use yii\filters\AccessControl;        // เรียกใช้ คลาส AccessControl
use app\models\User;             // เรียกใช้ Model คลาส User ที่ปรับปรังปรุงไว้
use app\components\AccessRule;   // เรียกใช้ คลาส Component AccessRule ที่เราสร้างใหม่


/**
 * Award2uploadController implements the CRUD actions for Award2upload model.
 */
class Award2uploadController extends Controller
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

    /**
     * Lists all Award2upload models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new Award2uploadSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Award2upload model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Award2upload model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    
    public function actionCreate()
    {
        $model = new Award2upload();

        if ($model->load(Yii::$app->request->post()) ) {

            $this->CreateDir($model->ref);
    
            $model->covenant = $this->uploadSingleFile($model);
           // $model->docs = $this->uploadMultipleFile($model);
    
            if($model->save()){
                 return $this->redirect(['index', 'id' => $model->id]);
            }
    
        } else {
             $model->ref = substr(Yii::$app->getSecurity()->generateRandomString(),10);
        }
    
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Award2upload model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $tempCovenant = $model->covenant;
       // $tempDocs     = $model->docs;
        if ($model->load(Yii::$app->request->post())) {
            $model->covenant = $this->uploadSingleFile($model,$tempCovenant);
           // $model->docs = $this->uploadMultipleFile($model,$tempDocs);
            if($model->save()){
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }
    
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Award2upload model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Award2upload::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Finds the Award2upload model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Award2upload the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDownload($id,$file,$file_name){
        $model = $this->findModel($id);
         if(!empty($model->ref) && !empty($model->covenant)){
                Yii::$app->response->sendFile($model->getUploadPath().'/'.$model->ref.'/'.$file,$file_name);
        }else{
            $this->redirect(['/award2upload/view','id'=>$id]);
        }
    }

    /**
     * Upload & Rename file
     * @return mixed
     */
    private function uploadSingleFile($model,$tempFile=null){
        $file = [];
        $json = '';
        try {
             $UploadedFile = UploadedFile::getInstance($model,'covenant');
             if($UploadedFile !== null){
                 $oldFileName = $UploadedFile->basename.'.'.$UploadedFile->extension;
                 $newFileName = md5($UploadedFile->basename.time()).'.'.$UploadedFile->extension;
                 $UploadedFile->saveAs(Award2upload::UPLOAD_FOLDER.'/'.$model->ref.'/'.$newFileName);
                 $file[$newFileName] = $oldFileName;
                 $json = Json::encode($file);
             }else{
                $json=$tempFile;
             }
        } catch (Exception $e) {
            $json=$tempFile;
        }
        return $json ;
    }

    private function uploadMultipleFile($model,$tempFile=null){
             $files = [];
             $json = '';
             $tempFile = Json::decode($tempFile);
             $UploadedFiles = UploadedFile::getInstances($model,'docs');
             if($UploadedFiles!==null){
                foreach ($UploadedFiles as $file) {
                    try {   $oldFileName = $file->basename.'.'.$file->extension;
                            $newFileName = md5($file->basename.time()).'.'.$file->extension;
                            $file->saveAs(Award2upload::UPLOAD_FOLDER.'/'.$model->ref.'/'.$newFileName);
                            $files[$newFileName] = $oldFileName ;
                    } catch (Exception $e) {

                    }
                }
                $json = json::encode(ArrayHelper::merge($tempFile,$files));
             }else{
                $json = $tempFile;
             }
            return $json;
    }



    private function CreateDir($folderName){
        if($folderName != NULL){
            $basePath = Award2upload::getUploadPath();
            if(BaseFileHelper::createDirectory($basePath.$folderName,0777)){
               // BaseFileHelper::createDirectory($basePath.$folderName.'/thumbnail',0777);
            }
        }
        return;
    }

    private function removeUploadDir($dir){
        BaseFileHelper::removeDirectory(Award2upload::getUploadPath().$dir);
    }
}

