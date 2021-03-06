<?php

Yii::setAlias('@themes', dirname(__DIR__) . '/themes');

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'language' => 'th',
    // 'aliases'=>[
    //     '@agency' => '@app/themes/agency',
    //          ],
    'modules' => [
        'gridview' => [
            'class' => '\kartik\grid\Module'
        ]
    ],
    'language' => 'th-TH',
    'modules' => [
        'user' => [
            'class' => 'dektrium\user\Module',
            'enableUnconfirmedLogin' => true,
            'confirmWithin' => 21600,
            'cost' => 12,
            'admins' => ['admin']
        ],
        'request' => [
            'class' => 'app\modules\request\Module',
        ],
        'sheets' => [

            'class' => 'app\modules\sheets\Module',
        ],
        
        // 'ehr' => [

        //     'class' => 'app\modules\ehr\Module',

        // ],
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 's04_d2CggaF-wTof3C32xFKG2_FpwmZ_',
        ],
        'main' => [
            'class' => 'app\components\Main'
        ],
        'image' => [
            'class' => 'yii\image\ImageDriver',
            'driver' => 'GD', //GD or Imagick
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            //'identityClass' => 'app\models\User',
            'identityClass' => 'dektrium\user\models\User',
            #'enableAutoLogin' => true,
            'enableAutoLogin' => false,
            'authTimeout'=>300,  //Number of second to Automatic Logout if inactive
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),
        'db3' => require(__DIR__ . '/db3.php'),
        /*
          'urlManager' => [
          'enablePrettyUrl' => true,
          'showScriptName' => false,
          'rules' => [
          ],
          ],
         */
        'formatter' => [
            'defaultTimeZone' => 'Asia/Bangkok',
            'timeZone' => 'Asia/Bangkok',
            'dateFormat' => 'php:d/m/Y',
            'datetimeFormat' => 'php:d/m/Y, H:i:s'
        ],
        'thaiFormatter' => [
            'class' => 'dixonsatit\thaiYearFormatter\ThaiYearFormatter',
        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
      // 'class' => '\kartik\grid\Module',
       
    ];
}

return $config;
