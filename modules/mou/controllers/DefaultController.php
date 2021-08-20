<?php

namespace app\modules\mou\controllers;
use Yii;
use yii\web\Controller;
use app\modules\mou\models\Mou;
use app\modules\mou\models\MouSearch;

/**
 * Default controller for the `mou` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new MouSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
}
