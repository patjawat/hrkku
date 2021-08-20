<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\hradmin\models\ReaderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'คณะกรรมการผู้ทรงคุณวุฒิ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reader-index">
    <p>
        <?= Html::a('Create Reader', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'sex',
            'fname',
            'lname',
            'position',
            //'major',
            //'affiliation',
            //'contact',
            //'email:email',
            //'phone',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
