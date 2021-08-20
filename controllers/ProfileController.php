<?php

namespace app\controllers;
use app\modules\hradmin\models\Tracking;

class ProfileController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $model = Tracking::findOne(2);
        return $this->render('index',['model' => $model]);
    }

}
