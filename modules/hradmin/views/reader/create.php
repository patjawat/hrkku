<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\hradmin\models\Reader */

$this->title = 'สร้างรายการคณะกรรมการผู้ทรงคุณวุฒิ';
$this->params['breadcrumbs'][] = ['label' => 'Readers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reader-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
