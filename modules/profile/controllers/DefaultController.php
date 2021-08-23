<?php

namespace app\modules\profile\controllers;
use Yii;
use yii\web\Controller;
use app\modules\hradmin\models\Tracking;
use app\models\Profile;

/**
 * Default controller for the `profile` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $model = Tracking::findOne(['created_by' =>  Yii::$app->user->id]);
        return $this->render('index',[
            'model' => $model,
        ]);
    }
    public function actionCreatePerformance()
    {

        $model = new Tracking([
            'created_by' => Yii::$app->user->id
        ]);

        $profile = Profile::findOne(Yii::$app->user->id);

        if ($model->load(Yii::$app->request->post())) {

            // if(!$profile->fname){
           
            //     $profile->pname = $model->pname;
            //     $profile->fname = $model->fname;
            //     $profile->lname = $model->lname;
            //     $profile->save(false);

            // }
            $model->save();
        
            Yii::$app->session->setFlash(\dominus77\sweetalert2\Alert::TYPE_SUCCESS, 'บันทึกข้อมูลสำเร็จ!');
           
                return $this->redirect(['/profile']);

        } else {
            $model->ref = substr(Yii::$app->getSecurity()->generateRandomString(),10);
       }

        return $this->render('create', [
            'model' => $model,
        ]);
    
    }
}
