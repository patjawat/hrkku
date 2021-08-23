<?php

namespace app\controllers;
use app\modules\hradmin\models\Tracking;

class SettingsController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}
