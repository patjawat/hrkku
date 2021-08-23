<?php

use \kartik\datecontrol\Module;

//เพิ่ม module ที่นี่ที่เดียว
$modules = [];

// วิธีแก้ authgoogle Error
// unset($params['authuser']);
// unset($params['session_state']);
// unset($params['prompt']);

$modules['datecontrol'] = [
    'class' => 'kartik\datecontrol\Module',
    'displaySettings' => [
        Module::FORMAT_DATE => 'yyyy-MM-dd',
        Module::FORMAT_TIME => 'hh:mm:ss a',
        Module::FORMAT_DATETIME => 'yyyy-MM-dd hh:i:ss',
    ],
    'saveSettings' => [
        Module::FORMAT_DATE => 'php:Y-m-d',
        Module::FORMAT_TIME => 'php:H:i:s',
        Module::FORMAT_DATETIME => 'php:Y-m-d H:i:s',
    ],
    'displayTimezone' => 'Asia/Bangkok',
    'autoWidget' => true,
    'autoWidgetSettings' => [
        Module::FORMAT_DATE => ['type' => 2, 'pluginOptions' => ['autoclose' => true]], // example
        Module::FORMAT_DATETIME => ['type' => 2, 'pluginOptions' => [
                'autoclose' => true,
                'todayHighlight' => true,
                'class' => 'xx'
            ]],
        Module::FORMAT_TIME => [],
    ],]; //Oh

$modules['user'] = [
    'class' => 'dektrium\user\Module',
    'enableUnconfirmedLogin' => true,
    'confirmWithin' => 21600,
    'cost' => 12,
    'admins' => ['admin'],
    'controllerMap' => [
        'login' => [
            'class' => \dektrium\user\controllers\SecurityController::className(),
            'on ' . \dektrium\user\controllers\SecurityController::EVENT_AFTER_LOGIN => function ($e) {
                // Yii::$app->response->redirect(array('/user/security/login'))->send();
                Yii::$app->response->redirect(array('/site/login'))->send();
                Yii::$app->end();
            },
        ],
        'security' => [
            'class' => \dektrium\user\controllers\SecurityController::className(),
            'on ' . \dektrium\user\controllers\SecurityController::EVENT_AFTER_LOGIN => function ($e) {

                Yii::$app->response->redirect('/site/index')->send();

                // if (Yii::$app->user->can('student free')) {
                //     Yii::$app->response->redirect(array('/course'))->send();
                // }
                // if (Yii::$app->user->can('admin')) {
                //     Yii::$app->response->redirect('http://site.ru/user/')->send();
                // }
            

                //Yii::$app->response->redirect(Yii::$app->request->referrer)->send();
            //    Yii::$app->response->redirect(array('/user/'.Yii::$app->user->id))->send();
                //Yii::$app->end();
            }
    ],
    ],
    
];

$modules['gridview'] = ['class' => '\kartik\grid\Module']; //system
$modules['usermanager'] = ['class' => 'app\modules\usermanager\Usermanager']; //จัดการผู้ใช้งานระบบ
// $modules['dashboard'] = ['class' => 'app\modules\dashboard\Module']; //dashboard
$modules['complaint'] = ['class' => 'app\modules\complaint\Module']; //เรื่องร้องทุกข์
$modules['followup'] = ['class' => 'app\modules\followup\Module']; //เรื่องร้องทุกข์ติดตาม
$modules['hradmin'] = ['class' => 'app\modules\hradmin\Module']; //hr
$modules['profile'] = ['class' => 'app\modules\profile\Module']; //hr

return $modules;
