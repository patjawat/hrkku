<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\mou\models\Mou */

$this->title = 'รับเรื่องติดตาม';
$this->params['breadcrumbs'][] = ['label' => 'Mous', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mou-create">

    <?= $this->render('_form', [
        'model' => $model,
        'initialPreview'=>[],
        'initialPreviewConfig'=>[]
    ]) ?>

</div>
