<?php

use yii\helpers\Html;
use yii\helpers\Url;
use kartik\widgets\Select2;
use yii\bootstrap4\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\widgets\FileInput;
use phpnt\ICheck\ICheck;
/* @var $this yii\web\View */
/* @var $model app\modules\mou\models\Mou */
/* @var $form yii\widgets\ActiveForm */
?>
<style>
.form-group>label {
    text-align: end;
    font-size: 15px;
}

.help-block {
    display: block;
    margin-top: 0px;
    margin-bottom: 0px;
    color: #737373;
}

.form-group {
    margin-bottom: 5px;
}
</style>
<div class="mou-form">

    <?php //$form = ActiveForm::begin();
    $form = ActiveForm::begin([
      
        // 'validationUrl' => ['/chiefcomplaint/chiefcomplaint/ajax-validation'],
        'fieldConfig' => [
            'horizontalCssClasses' => [
                'label' => 'col-lg-4 col-md-5 col-sm-5',
                'wrapper' => 'col-lg-8 col-md-8 col-sm-8 offset-sm-0',
            ],
        ],
        'layout' => 'horizontal',
        'options' => ['enctype' => 'multipart/form-data']
    ]);
    
    ?>
       <?= $form->field($model, 'ref')->hiddenInput(['maxlength' => 50])->label(false); ?>
    <div class="row">
        <div class="col-6">
            <?= $form->field($model, 'topic')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'department')->textInput() ?>
            <?= $form->field($model, 'contact')->textInput(['maxlength' => true]) ?>

            <div class="form-group row field-mou-date_start">
                <label class="col-lg-4 col-md-5 col-sm-5" for="mou-date_start"></label>
                <div class="col-lg-8 col-md-8 col-sm-8 offset-sm-0">
                    <div class="form-group">
                        <?= Html::submitButton('<i class="fas fa-check"></i> บันทึก', ['class' => 'btn btn-success']) ?>
                        <?=Html::a('ยกเลิก',["/mou/mou"],['class' => 'btn btn-secondary'])?>
                    </div>

                </div>
            </div>



        </div>
        <div class="col-6">

            <?= $form->field($model, 'results')->textInput(['maxlength' => true]) ?>

            <?php // $form->field($model, 'level')->textInput(['maxlength' => true]) ?>
<?php
echo $form->field($model, 'level')->widget(Select2::classname(), [
    'data' => [7=>'ภายใน 7 วันทำการ',15 =>'ภายใน 15 วันทำการ'],
    'options' => ['placeholder' => 'ใช้เวลาในการพิจารณา...'],
    'pluginOptions' => [
        'allowClear' => true
    ],
]);

?>
        </div>
    </div>

    <?= FileInput::widget([
                   'name' => 'upload_ajax[]',
                   'options' => ['multiple' => true,'accept' => 'image/*'], //'accept' => 'image/*' หากต้องเฉพาะ image
                    'pluginOptions' => [
                        'overwriteInitial'=>false,
                        'initialPreviewShowDelete'=>true,
                       'initialPreview'=> $initialPreview,
                        'initialPreviewConfig'=> $initialPreviewConfig,
                        'uploadUrl' => Url::to(['/mou/mou/upload-ajax']),
                        'uploadExtraData' => [
                            'ref' => $model->ref,
                        ],
                        'maxFileCount' => 100
                    ]
                ]);
    ?>



<?php ActiveForm::end(); ?>


</div>