<?php

use yii\helpers\Html;
use kartik\widgets\Select2;
use yii\bootstrap4\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\web\View;
use app\modules\hradmin\models\TrackingPosition;
use app\modules\hradmin\models\StepStatus;
use app\modules\hradmin\models\Reader;

$list = ArrayHelper::map(StepStatus::find()->all(),'id','name');
$reader = ArrayHelper::map(Reader::find()->all(),'id',function($model){
    return $model->position.$model->fname.' '.$model->lname;
});
?>

<div class="tracking-form container">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-2">
        <?=$form->field($model, 'pname')->widget(Select2::classname(), [
    'data' => [
        'นาย' => 'นาย',
        'นาง' => 'นาง',
        'นางสาว' => 'นางสาว',
    ],
    'options' => ['placeholder' => 'เลือกคำนำหน้า ...'],
    'pluginOptions' => [
        'allowClear' => true
    ],
]);?>
        </div>
        <div class="col-5">
            <?= $form->field($model, 'fname')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-5">
            <?= $form->field($model, 'lname')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-6">

    <?=$form->field($model, 'position_type')->widget(Select2::classname(), [
    'data' => [
        'ปกติ' => 'ปกติ',
        'พิเศษ' => 'พิเศษ',
    ],
    'options' => ['placeholder' => 'เลือกวิธี ...'],
    'pluginOptions' => [
        'allowClear' => true
    ],
]);?>
</div>
 <div class="col-6">
    <?=$form->field($model, 'position')->widget(Select2::classname(), [
    'data' => ArrayHelper::map(TrackingPosition::find()->all(),'id','name'),
    'options' => ['placeholder' => 'เลือกตำแหน่ง ...'],
    'pluginOptions' => [
        'allowClear' => true
    ],
]);?>
 </div>
    </div>

    <div class="row">
        <div class="col-6">
            <?= $form->field($model, 'branch_code')->textInput() ?>
        </div>
        <div class="col-6">
            <?= $form->field($model, 'branch')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <?=$form->field($model, 'reader')->widget(Select2::classname(), [
    'data' => $reader,
    'options' => ['placeholder' => 'เลือกกรรมการ ...'],
    'pluginOptions' => [
        'allowClear' => true,
        'multiple' => true
    ],
]);?>
    <?= $form->field($model, 'local_meeting_date')->textInput() ?>

    <?= $form->field($model, 'hr_getsubject_date')->textInput() ?>

    <?= $form->field($model, 'step1')->inline()->radioList($list); ?>

    <?= $form->field($model, 'step1_comment')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'step2')->inline()->radioList($list); ?>

    <?= $form->field($model, 'step2_comment')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'step3')->inline()->radioList($list); ?>
    <?= $form->field($model, 'step3_comment')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'step4')->inline()->radioList($list); ?>
    <?= $form->field($model, 'step4_comment')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'step5')->inline()->radioList($list); ?>
    <?= $form->field($model, 'step5_comment')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'step6')->inline()->radioList($list); ?>
    <?= $form->field($model, 'step6_date')->textInput() ?>
    <?= $form->field($model, 'step6_comment')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'step7')->inline()->radioList($list); ?>
    <?= $form->field($model, 'step7_comment')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'step8')->inline()->radioList($list); ?>
    <?= $form->field($model, 'step8_comment')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'success')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>