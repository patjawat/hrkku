<?php

namespace app\modules\hradmin;
use Yii;
/**
 * hradmin module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\hradmin\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();
        parent::init();
        Yii::$app->view->theme = new \yii\base\Theme([
            'pathMap' => ['@app/views' => '@app/modules/hradmin/themes/views'],
        ]);
        // custom initialization code goes here
    }
}
