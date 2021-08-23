<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Tracking */

$this->title = $model->pname.$model->fname.' '.$model->lname;
$this->params['breadcrumbs'][] = ['label' => 'Trackings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<style>
    .step-box{
        background-color: #e8e8e8;
        padding: 22px;
        border-radius: 10px;
        margin-bottom: 8px;

    }
</style>
<div class="tracking-view">

    <div class="callout callout-info">
        <h5><i class="fas fa-info"></i> ขอกำหนดตำแหน่ง: <code><?=$model->positionname->name?> </code>&nbsp; ในสาขาวิชา :
            <code><?=$model->branch;?> </code>(<?=$model->branch_code?>)
        </h5>
        This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
    </div>


    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">แสดงข้อมูล</h3>

            <div class="card-tools">
                <?= Html::a('<i class="far fa-edit"></i> แก้ไข', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('<i class="far fa-trash-alt"></i> ลบทิ้ง', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ]) ?>
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body" style="display: block;">

            <div class="step-box">
                <h6><?=$model->getAttributeLabel('step1')?>
                    &nbsp;<span class="text-success"><?=$model->stepStatusView($model->step1)?></span></h6>
                <p>หมายเหตุ : <code><?=$model->step1_comment;?></code></p>
            </div>

            <div class="step-box">
                <h6><?=$model->getAttributeLabel('step2')?>
                    &nbsp;<code><?=$model->stepStatusView($model->step1)?></code></h6>
                <p>หมายเหตุ : <code><?=$model->step2_comment;?></code></p>
            </div>
            
            <div class="step-box">
                <h6><?=$model->getAttributeLabel('step3')?>
                    &nbsp;<code><?=$model->stepStatusView($model->step2)?></code></h6>
                <p>หมายเหตุ : <code><?=$model->step2_comment;?></code></p>
            </div>
            
            <div class="step-box">
                <h6><?=$model->getAttributeLabel('step4')?>
                    &nbsp;<code><?=$model->stepStatusView($model->step4)?></code></h6>
                <p>หมายเหตุ : <code><?=$model->step4_comment;?></code></p>
            </div>
            
            <div class="step-box">
                <h6><?=$model->getAttributeLabel('step5')?>
                    &nbsp;<code><?=$model->stepStatusView($model->step5)?></code></h6>
                <p>หมายเหตุ : <code><?=$model->step5_comment;?></code></p>
            </div>
            

            <div class="step-box">
                <h6><?=$model->getAttributeLabel('step6')?>
                    &nbsp;<code><?=$model->stepStatusView($model->step6)?></code></h6>
                <p>หมายเหตุ : <code><?=$model->step6_comment;?></code></p>
            </div>

            <div class="step-box">
                <h6><?=$model->getAttributeLabel('step7')?>
                    &nbsp;<code><?=$model->stepStatusView($model->step7)?></code></h6>
                <p>หมายเหตุ : <code><?=$model->step7_comment;?></code></p>
            </div>

            <div class="step-box">
                <h6><?=$model->getAttributeLabel('step8')?>
                    &nbsp;<code><?=$model->stepStatusView($model->step8)?></code></h6>
                <p>หมายเหตุ : <code><?=$model->step8_comment;?></code></p>
            </div>


        </div>
        <!-- /.card-body -->
    </div>




</div>