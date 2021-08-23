<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\TrackingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ผู้ขอกำหนดตำแหน่งทางวิชาการ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tracking-index">
    <p>
        <?= Html::a('สร้างรายการใหม่', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'pname',
            'fname',
            'lname',
            'position',
            //'branch',
            //'branch_code',
            //'local_meeting_date',
            //'hr_getsubject_date',
            //'step1',
            //'step1_comment',
            //'step2',
            //'step2_comment',
            //'step3',
            //'step4',
            //'step5',
            //'step6',
            //'step6_date',
            //'step7',
            //'step8',
            //'success',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
