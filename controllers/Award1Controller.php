<?php

namespace app\controllers;

use Yii;
use app\models\Award1;
use app\models\Award1Search;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
/* เพิ่มคำสั่ง 3 บรรทัดต่อจากนี้ลงไป */
use yii\filters\AccessControl;        // เรียกใช้ คลาส AccessControl
use app\models\User;             // เรียกใช้ Model คลาส User ที่ปรับปรังปรุงไว้
use app\components\AccessRule;   // เรียกใช้ คลาส Component AccessRule ที่เราสร้างใหม่


/**
 * Award1Controller implements the CRUD actions for Award1 model.
 */
class Award1Controller extends Controller
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
                            //'?', 
                           // '@',
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
    /**
     * Lists all Award1 models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new Award1Search();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->sort->defaultOrder = ['id' => SORT_DESC];

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Award1 model.
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
     * Creates a new Award1 model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Award1();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->photo = $model->upload($model,'photo');
            $model->save();
            return $this->redirect(['index', 'id' => $model->id]);
        } else {
            return $this->renderAjax('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Award1 model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->photo = $model->upload($model,'photo');
            $model->save();
            return $this->redirect(['index', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Award1 model.
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
     * Finds the Award1 model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Award1 the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Award1::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
