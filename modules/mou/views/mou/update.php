<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\mou\models\Mou */

$this->title = 'แก้ไข: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Mous', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mou-update">

    <?= $this->render('_form', [
        'model' => $model,
        'initialPreview'=>$initialPreview,
             'initialPreviewConfig'=>$initialPreviewConfig
    ]) ?>

</div>
