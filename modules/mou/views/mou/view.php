<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\mou\models\Mou */

$this->title = 'เรื่อง '.$model->topic;
$this->params['breadcrumbs'][] = ['label' => 'Mous', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<style>
.detail1-view {
    margin-left:20px;
    margin-bottom:20px;
    float:left;
    width: 300px; 
    border:1px solid #000;
}

</style>
<div class="mou-view">

    <p>
        <?= Html::a('<i class="far fa-edit"></i> แก้ไข', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('<i class="fas fa-trash"></i> ลบทิ้ง', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        // 'options' => ['class' => 'detail1-view'],
        'attributes' => [
            'id',
            'topic',
            'department',
            'contact',
            'date_start',
            'date_end',
            'results',
            'level',
            'expire',
            'create_by',
            'created_at',
        ],
    ]) ?>

</div>
