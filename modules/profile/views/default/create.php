<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\hradmin\models\Reader */

$this->title = 'ขอกำหนดตำแหน่งทางวิชาการ';
$this->params['breadcrumbs'][] = ['label' => 'Readers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="reader-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
