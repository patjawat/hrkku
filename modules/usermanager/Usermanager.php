<?php

namespace app\modules\usermanager;
use Yii;
/**
 * usermanager module definition class
 */
class Usermanager extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\usermanager\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();
        Yii::$app->view->theme = new \yii\base\Theme([
            'pathMap' => ['@app/views' => '@app/modules/hradmin/themes/views'],
        ]);
        // custom initialization code goes here
    }
}
