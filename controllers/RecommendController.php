<?php

namespace app\controllers;

use Yii;
use app\models\Recommend;
use app\models\RecommendSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
/* เพิ่มคำสั่ง 3 บรรทัดต่อจากนี้ลงไป */
use yii\filters\AccessControl;        // เรียกใช้ คลาส AccessControl
use app\models\User;             // เรียกใช้ Model คลาส User ที่ปรับปรังปรุงไว้
use app\components\AccessRule;   // เรียกใช้ คลาส Component AccessRule ที่เราสร้างใหม่


/**
 * RecommendController implements the CRUD actions for Recommend model.
 */
class RecommendController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors(){
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            'access'=>[
                'class'=>AccessControl::className(),
                'only'=> ['index','create','update','view','delete'],
                'ruleConfig'=>[
                    'class'=>AccessRule::className()
                ],
                'rules'=>[
                    [
                        'actions'=>['index','create','view'],
                        'allow'=> true,
                        'roles' => [
                            '?', 
                            '@',
                            User::ROLE_USER,
                           User::ROLE_EMPLOYEE,
                           User::ROLE_ADMIN
                         ]
                    ],
                    [
                        'actions'=>['update'],
                        'allow'=> true,
                        'roles'=>[
                            User::ROLE_EMPLOYEE,
                            User::ROLE_ADMIN
                        ]
                    ],
                    [
                        'actions'=>['delete'],
                        'allow'=> true,
                        'roles'=>[User::ROLE_ADMIN]
                    ]
                ]
            ]
        ];
    }

    public function sendLine($model)  {

            //$line_token = '7vRd5JQNbxadXQa7trZbK7VTvR6fPFGErqCdJH8ZDyY';
            $line_token = 'xSWLFteOuC3L7xEE92znVQOVTDBe3PgMlRmFfvEpInu';

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL,"https://notify-api.line.me/api/notify");
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, "message=".$model->name.' '.$model->recommend.'  '.$model->telephone);
          //  <!--if(!empty(Yii::$app->request->getFirstImage($model->request_text))) {
              //  curl_setopt($ch, CURLOPT_POSTFIELDS, "message=".$model->fullname."imageThumbnail".Yii::$app->request->getFirstImage($model->request_text)."$imageFullsize=".Yii::$app->request->getFirstImage($model->request_text));
          // }else{
             //   curl_setopt($ch, CURLOPT_POSTFIELDS, "message=".$model->fullname);-->
            


           // curl_setopt($ch, CURLOPT_POSTFIELDS, $message);
            // follow redirects
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Content-type: application/x-www-form-urlencoded',
                'Authorization: Bearer '.$line_token,
            ]);
            // receive server response ...
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $server_output = curl_exec ($ch);

            curl_close ($ch);
        }
    public function actionIndex()
    {
        $searchModel = new RecommendSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Recommend model.
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
     * Creates a new Recommend model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Recommend();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->getSession()->setFlash('alert',[
                'body'=>'ข้อเสนอแนะบันทึกเสร็จเรียบร้อย! เจ้าหน้าที่จะดำเนินการให้เร็วที่สุด....ขอบคุณค่ะ',
                'options'=>['class'=>'alert-warning']
            ]);
            //$this->sendLine($model);
            $this->sendLine($model);
            return $this->redirect(['create', 'id' => $model->id]);


            return $this->redirect(['create', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Recommend model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Recommend model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Recommend model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Recommend the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Recommend::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
