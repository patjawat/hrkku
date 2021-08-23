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

$list = ArrayHelper::map(StepStatus::find()->where([
    'id' => [1,2,3],
    ])->all(),'id','name');
$reader = ArrayHelper::map(Reader::find()->all(),'id',function($model){
    return $model->position.$model->fname.' '.$model->lname;
});
?>

<style>
.box-step {
    background-color: #fff;
    padding: 12px;
    border-radius: 10px;
    margin-bottom: 10px;
}
</style>
<div class="tracking-form container">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'ref')->hiddenInput(['maxlength' => 50])->label(false); ?>
<div class="box-step">
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


    <?=$form->field($model, 'local_meeting_date')->widget(DateControl::classname(), [
 'type'=>DateControl::FORMAT_DATE,
 'displayFormat' => 'dd/MM/yyyy',
 'language' => 'th',

]);?>
    <?=$form->field($model, 'hr_getsubject_date')->widget(DateControl::classname(), [
'type'=>DateControl::FORMAT_DATE,
'displayFormat' => 'dd/MM/yyyy',
'language' => 'th',


]);?>
</div>
    <div class="box-step">
        <?= $form->field($model, 'step1')->inline()->radioList($list); ?>
        <?= $form->field($model, 'step1_comment')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="box-step">
        <?= $form->field($model, 'step2')->inline()->radioList($list); ?>
        <?= $form->field($model, 'step2_comment')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="box-step">
        <?= $form->field($model, 'step3')->inline()->radioList($list); ?>
        <?= $form->field($model, 'step3_comment')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="box-step">
        <?= $form->field($model, 'step4')->inline()->radioList($list); ?>
        <?= $form->field($model, 'step4_comment')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="box-step">
        <?= $form->field($model, 'step5')->inline()->radioList($list); ?>
        <?= $form->field($model, 'step5_comment')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="box-step">
        <?= $form->field($model, 'step6')->inline()->radioList($list); ?>
        <?=$form->field($model, 'step6_date')->widget(DateControl::classname(), [
        'type'=>DateControl::FORMAT_DATE,
        'displayFormat' => 'dd/MM/yyyy',
        'language' => 'th',
        ]);?>
        <?= $form->field($model, 'step6_comment')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="box-step">
        <?= $form->field($model, 'step7')->inline()->radioList($list); ?>
        <?=$form->field($model, 'step7_date')->widget(DateControl::classname(), [
        'type'=>DateControl::FORMAT_DATE,
        'displayFormat' => 'dd/MM/yyyy',
        'language' => 'th',
        ]);?>
        <?= $form->field($model, 'step7_comment')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="box-step">
        <?= $form->field($model, 'step8')->inline()->radioList($list); ?>
        <?= $form->field($model, 'step8_comment')->textInput(['maxlength' => true]) ?>
    </div>

    <?=$form->field($model, 'reader')->widget(Select2::classname(), [
    'data' => $reader,
    'options' => ['placeholder' => 'เลือกกรรมการ ...'],
    'pluginOptions' => [
        'allowClear' => true,
        'multiple' => true
    ],
]);?>


    <?php $form->field($model, 'success')->textInput() ?>

    <?= FileInput::widget([
                   'name' => 'upload_ajax[]',
                   'options' => ['multiple' => true,'accept' => 'image/*'], //'accept' => 'image/*' หากต้องเฉพาะ image
                    'pluginOptions' => [
                        'overwriteInitial'=>false,
                        'initialPreviewShowDelete'=>true,
                       'initialPreview'=> $initialPreview,
                        'initialPreviewConfig'=> $initialPreviewConfig,
                        'uploadUrl' => Url::to(['/hradmin/tracking/upload-ajax']),
                        'uploadExtraData' => [
                            'ref' => $model->ref,
                        ],
                        'maxFileCount' => 100
                    ]
                ]);
    ?>

    <div class="form-group">
        <?= Html::submitButton('บันทึก', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>