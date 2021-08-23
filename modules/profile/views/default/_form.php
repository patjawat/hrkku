<?php

use yii\helpers\Html;
use yii\helpers\Url;
use kartik\widgets\Select2;
use yii\bootstrap4\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\widgets\FileInput;
use kartik\datecontrol\DateControl;
use yii\web\View;
use app\modules\hradmin\models\TrackingPosition;
use app\modules\hradmin\models\StepStatus;
use app\modules\hradmin\models\Reader;
?>

<div class="reader-form container box-content">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'ref')->hiddenInput(['maxlength' => 50])->label(false); ?>


        <div class="row">
            <div class="col-3">
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
            <div class="col-3">
                <?= $form->field($model, 'fname')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-3">
                <?= $form->field($model, 'lname')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-3">
                <?= $form->field($model, 'affiliation')->textInput(['maxlength' => true]) ?>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <?=$form->field($model, 'position')->widget(Select2::classname(), [
    'data' => ArrayHelper::map(TrackingPosition::find()->all(),'id','name'),
    'options' => ['placeholder' => 'เลือกตำแหน่ง ...'],
    'pluginOptions' => [
        'allowClear' => true
    ],
]);?>
            </div>
            <div class="col-3">

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
            <div class="col-3">
                <?=$form->field($model, 'position_way')->inline()->radioList(['1'=>'1','2'=>'2','3'=>'3'])?>
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


<div class="form-group">
    <?= Html::submitButton('<i class="fas fa-check"></i> บันทึก', ['class' => 'btn btn-success']) ?>
</div>

<?php ActiveForm::end(); ?>

</div>