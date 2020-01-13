<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\data\SqlDataProvider;
use app\models\News;
use app\models\NewsSearch;
use app\models\Freelance;
use app\models\FreelanceSearch;
use app\models\PhotoLibrarySearch;
use yii\data\ActiveDataProvider;
use app\models\Event;
use app\models\EventSearch;
use app\models\DonateSearch;

class SiteController extends Controller {

    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
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

    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
        
    }
    

    public function actionIndex() {

        $searchModel = new NewsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination->pageSize = 5;
        $dataProvider->sort->defaultOrder = ['id' => 'DESC'];

        $newswork = $searchModel->searchNewswork();
        $newswork->pagination->pageSize = 5;
        $newswork->sort->defaultOrder = ['id' => 'DESC'];

        $newspurchase = $searchModel->searchNewspurchase();
        $newspurchase->pagination->pageSize = 5;
        $newspurchase->sort->defaultOrder = ['id' => 'DESC'];

        $searchModel = new PhotoLibrarySearch();
        $dataProvider2 = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider2->sort->defaultOrder = ['id'=>'DESC'];

        $searchModel = new DonateSearch();
        $dataProvider3 = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider3->sort->defaultOrder = ['id'=>'DESC'];


        $events  = Event::find()->all();
        $eventos = [];

        foreach ($events as $event):
            $Event = new \yii2fullcalendar\models\Event();
            $Event->id = $event->id;
            //$Event->className = 'alert alert-success';
            $Event->backgroundColor = 'light blue';
            $Event->borderColor = 'yellow';
            $Event->title = $event->title;
            //$Event->description = $event->description;
            $Event->start = $event->created_date;
            $Event->end = date('Y-m-d', strtotime('+1 day', strtotime($event->end)));
            //$Event->url = 'index.php?r=event/view&id='.$event->id;
            $eventos[]    = $Event;
        endforeach;

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'dataProvider2' => $dataProvider2,
                    'dataProvider3' => $dataProvider3,
                    'newswork' => $newswork,
                    'newspurchase' => $newspurchase,
                    'events' => $eventos,
        ]);
    }

    public function actionLogin() {
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

    public function actionLogout() {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact() {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
                    'model' => $model,
        ]);
    }

    public function actionAbout() {
        return $this->render('about');
    }

    public function actionStory() {
        return $this->render('story');
    }

    public function actionVision_mission() {
        return $this->render('vision_mission');
    }

    public function actionStructure() {
        return $this->render('structure');
    }

    public function actionPersonnel() {
        return $this->render('personnel');
    }

    public function actionMap() {
        return $this->render('map');
    }

    public function actionPolicy_plan() {
        return $this->render('policy_plan');
    }

    public function actionService() {
        return $this->render('service');
    }
    public function actionThaimed() {
        return $this->render('thaimed');
    }
    public  function actionPcu() {
        return $this->render('pcu');
    }
    public function actionStruc_m30() {
        return $this->render('struc_m30');
    }
    public function actionMap_m30() {
        return $this->render('map_m30');
    }
    public function actionBasic() {
        return $this->render('basic');
    }
    public function actionDental(){
        return $this->render('dental');
    }
    public function actionClinic() {
        return $this->render('clinic');
    }
    public function actionEr() {
        return $this->render('er');
    }
    public function actionRegister() {
        return $this->render('register');
    }
    public function actionDhdcservice() {
        return $this->render('dhdcservice');
    }
	public function actionAids() {
		return $this->render('aids');
    }
    public function actionCkd() {
        return $this->render('ckd');
    }
    public function actionPhisical() {
        return $this->render('phisical');
    }
    public function actionLr() {
        return $this->render('lr');
    }
    public function actionManage() {
        return $this->render('manage');
    }
    public function actionPharm() {
        return $this->render('pharm');
    }
    public function actionHolistic() {
        return $this->render('holistic');
    }
    public function actionQuality() {
        return $this->render('quality');
    }
    public function actionStrategic() {
        return $this->render('strategic');
    }
}
