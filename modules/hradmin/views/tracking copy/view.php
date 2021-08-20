<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Tracking */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Trackings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tracking-view">

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'pname',
            'fname',
            'lname',
            'position',
            'branch',
            'branch_code',
            'local_meeting_date',
            'hr_getsubject_date',
            'step1',
            'step1_comment',
            'step2',
            'step2_comment',
            'step3',
            'step4',
            'step5',
            'step6',
            'step6_date',
            'step7',
            'step8',
            'success',
        ],
    ]) ?>

</div>
