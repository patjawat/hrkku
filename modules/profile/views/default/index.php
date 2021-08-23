<?php
use dominus77\sweetalert2\Alert;
use yii\helpers\Html;
if(!Yii::$app->user->isGuest){
    $this->title = $model ? ($model->fname.' '.$model->lname) : '';
}
?>

<?= \dominus77\sweetalert2\Alert::widget(['useSessionFlash' => true]) ?>


<?php if($model):?>
<?php Html::img('@web/img/user4-128x128.jpg',['class' => 'profile-user-img img-fluid img-circle']);?>

<div class="callout callout-info mt-3 shadow">
    <h5><i class="fas fa-info"></i> ขอกำหนดตำแหน่ง: <code><?=$model->positionname->name?> </code>&nbsp; ในสาขาวิชา :
        <code><?=$model->branch;?> </code>(<?=$model->branch_code?>)
    </h5>
    This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
</div>



<div class="row">
    <div class="col-md-12">
        <!-- The time line -->
        <div class="timeline">
            <!-- /.timeline-label -->

            <!-- timeline item -->
            <?php if(isset($model->step1)):?>
            <div>
                <i class="fas fa-check bg-success"></i>
                <div class="timeline-item shadow">
                    <?=$model->stepStatusViewTimeline($model->step1)?>

                    <h3 class="timeline-header">ขั้นที่ 1 กองทรัพยากรบุคคลรับเรื่องจากคณะ/หน่วยงาน :
                        <span><?=$model->hr_getsubject_date;?></span></h3>

                    <div class="timeline-body">
                        <?=$model->step1_comment;?>
                    </div>
                </div>
            </div>
            <?php endif;?>
            <!-- END timeline item -->



            <!-- timeline item -->
            <?php if(isset($model->step2)):?>
            <div>
                <i class="fas fa-check bg-success"></i>
                <div class="timeline-item shadow">
                    <?=$model->stepStatusViewTimeline($model->step2)?>

                    <h3 class="timeline-header">ขั้นที่ 2 นำเรื่องเสนอคณะกรรมการพิจารณาตำแหน่งทางวิชาการ
                        เพื่อพิจารณารายละเอียดของผลงานทางวิชาการและรายชื่อผู้ทรงคุณวุฒิ </h3>

                    <div class="timeline-body">
                        <?=$model->step2_comment;?>
                    </div>
                </div>
            </div>
            <?php endif;?>
            <!-- END timeline item -->


            <!-- timeline item -->
            <?php if(isset($model->step3)):?>
            <div>
                <i class="fas fa-check bg-success"></i>
                <div class="timeline-item shadow">
                    <?=$model->stepStatusViewTimeline($model->step3)?>

                    <h3 class="timeline-header">ขั้นที่ 3 ติดต่อทาบทามคณะกรรมการผู้ทรงคุณวุฒิ
                        เพื่อทำหน้าที่ประเมินผลงานทางวิชาการ </h3>

                    <div class="timeline-body">
                        <?=$model->step3_comment;?>
                    </div>
                </div>
            </div>
            <?php endif;?>
            <!-- END timeline item -->


            <!-- timeline item -->
            <?php if(isset($model->step4)):?>
            <div>
                <i class="fas fa-check bg-success"></i>
                <div class="timeline-item shadow">
                    <?=$model->stepStatusViewTimeline($model->step4)?>

                    <h3 class="timeline-header">ขั้นที่ 4
                        รอผลการทาบทามคณะกรรมการผู้ทรงคุณวุฒิทำหน้าที่ประเมินผลงานทางวิชาการ </h3>

                    <div class="timeline-body">
                        <?=$model->step4_comment;?>
                    </div>
                </div>
            </div>
            <?php endif;?>
            <!-- END timeline item -->



            <!-- timeline item -->
            <?php if(isset($model->step5)):?>
            <div>
                <i class="fas fa-check bg-success"></i>
                <div class="timeline-item shadow">
                    <?=$model->stepStatusViewTimeline($model->step5)?>

                    <h3 class="timeline-header">ขั้นที่ 5 ส่งผลงานให้ผู้ทรงคุณวุฒิประเมิน </h3>

                    <div class="timeline-body">
                        <?=$model->step5_comment;?>
                    </div>
                </div>
            </div>
            <?php endif;?>
            <!-- END timeline item -->



            <!-- timeline item -->
            <?php if(isset($model->step6)):?>
            <div>
                <i class="fas fa-check bg-success"></i>
                <div class="timeline-item shadow">
                    <?=$model->stepStatusViewTimeline($model->step6)?>

                    <h3 class="timeline-header">ขั้นที่ 6 ประชุมคณะกรรมการพิจารณาตำแหน่งทางวิชาการทุกวันพฤหัสบดีที่ 3
                        ของทุกเดือน </h3>

                    <div class="timeline-body">
                        <p>วันที่ประชุมคณะกรรมการพิจารณาตำแหน่งทางวิชาการ : <?=$model->step6_date?></p>
                        <?=$model->step6_comment;?>
                    </div>
                </div>
            </div>
            <?php endif;?>
            <!-- END timeline item -->


            <!-- timeline item -->
            <?php if(isset($model->step7)):?>
            <div>
                <i class="fas fa-check bg-success"></i>
                <div class="timeline-item shadow">
                    <?=$model->stepStatusViewTimeline($model->step7)?>

                    <h3 class="timeline-header">ขั้นที่ 7 นำเรื่องเสนอที่ประชุมสภามหาวิทยาลัย </h3>

                    <div class="timeline-body">
                        <p>วันที่ประชุมสภามหาวิทยาลัย : <?=$model->step6_date?></p>
                        <?=$model->step7_comment;?>
                    </div>
                </div>
            </div>
            <?php endif;?>
            <!-- END timeline item -->

            <!-- timeline item -->
            <?php if(isset($model->step8)):?>
            <div>
                <i class="fas fa-check bg-success"></i>
                <div class="timeline-item shadow">
                    <?=$model->stepStatusViewTimeline($model->step8)?>

                    <h3 class="timeline-header">ขั้นที่ 8 คำสั่งแต่งตั้งให้ดำรงตำแหน่งทางวิชาการ </h3>

                    <div class="timeline-body">
                        <?=$model->step8_comment;?>
                    </div>
                </div>
            </div>
            <?php endif;?>
            <!-- END timeline item -->


           
        </div>

    </div>


    <?php else:?>
    <div class="profile-default-index">
        <div class="row">
            <div class="col-3">
                <?=Html::a('ขอกำหนดตำแหน่งทางวิชาการ',['/profile/default/create-performance'],['class' =>'btn btn-block btn-success'])?>
            </div>
        </div>

        <?php endif;?>


    </div>