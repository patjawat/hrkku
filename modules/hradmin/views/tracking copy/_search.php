<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TrackingSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tracking-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'pname') ?>

    <?= $form->field($model, 'fname') ?>

    <?= $form->field($model, 'lname') ?>

    <?= $form->field($model, 'position') ?>

    <?php // echo $form->field($model, 'branch') ?>

    <?php // echo $form->field($model, 'branch_code') ?>

    <?php // echo $form->field($model, 'local_meeting_date') ?>

    <?php // echo $form->field($model, 'hr_getsubject_date') ?>

    <?php // echo $form->field($model, 'step1') ?>

    <?php // echo $form->field($model, 'step1_comment') ?>

    <?php // echo $form->field($model, 'step2') ?>

    <?php // echo $form->field($model, 'step2_comment') ?>

    <?php // echo $form->field($model, 'step3') ?>

    <?php // echo $form->field($model, 'step4') ?>

    <?php // echo $form->field($model, 'step5') ?>

    <?php // echo $form->field($model, 'step6') ?>

    <?php // echo $form->field($model, 'step6_date') ?>

    <?php // echo $form->field($model, 'step7') ?>

    <?php // echo $form->field($model, 'step8') ?>

    <?php // echo $form->field($model, 'success') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
