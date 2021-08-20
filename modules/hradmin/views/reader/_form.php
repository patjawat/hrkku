<?php

use yii\helpers\Html;
use kartik\widgets\Select2;
use yii\bootstrap4\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\web\View;
/* @var $this yii\web\View */
/* @var $model app\modules\hradmin\models\Reader */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reader-form container">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
<div class="col-2">
<?=$form->field($model, 'position')->widget(Select2::classname(), [
    'data' => [
        'ผศ.' => 'ผศ.',
        'รศ.' => 'รศ.',
    ],
    'options' => ['placeholder' => 'เลือกตำแหน่ง ...'],
    'pluginOptions' => [
        'allowClear' => true
    ],
]);?>
</div>
<div class="col-6">
<?=$form->field($model, 'sex')->inline()->radioList([
        'M' => 'ชาย',
        'F' => 'หญิง',

]);?>
</div>
</div>

<div class="row">
<div class="col-6">
    <?= $form->field($model, 'fname')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'major')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'contact')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
</div>
<div class="col-6">
    <?= $form->field($model, 'lname')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'affiliation')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
</div>
</div>



    <div class="form-group">
        <?= Html::submitButton('บันทึก', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
