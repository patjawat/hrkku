<?php
use dominus77\sweetalert2\Alert;
use yii\helpers\Html;
if(!Yii::$app->user->isGuest){
    $this->title = $model ? ($model->pname.$model->fname.' '.$model->lname) : '';
}
?>

<?= \dominus77\sweetalert2\Alert::widget(['useSessionFlash' => true]) ?>


<?php if($model):?>
<?php Html::img('@web/img/user4-128x128.jpg',['class' => 'profile-user-img img-fluid img-circle']);?>

<div class="callout callout-info mt-3 shadow" data-aos="zoom-in" data-aos-delay="100">
    <h5><i class="fas fa-info"></i> ขอกำหนดตำแหน่ง: <code><?=$model->positionname->name?> </code>&nbsp; ในสาขาวิชา :
        <code><?=$model->branch;?> </code>(<?=$model->branch_code?>)
    </h5>

    30% <span class="pull-right">ผลการดำเนินงาน</span>
    <div class="progress">
        <div class="progress-bar bg-primary progress-bar-striped" role="progressbar" aria-valuenow="40"
            aria-valuemin="0" aria-valuemax="100" style="width: 30%">
            <span class="sr-only">40% Complete (success)</span>
        </div>
    </div>

</div>



<div class="row">
    <div class="col-md-12">
        <!-- The time line -->
        <div class="timeline">
            <!-- /.timeline-label -->

            <!-- timeline item -->
            <?php if(!is_null($model->step1)):?>
            <div data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000">
                <i class="fas fa-check bg-success"></i>
                <div class="timeline-item shadow">
                    <?=$model->stepStatusViewTimeline($model->step1)?>

                    <h3 class="timeline-header">ขั้นที่ 1 กองทรัพยากรบุคคลรับเรื่องจากคณะ/หน่วยงาน :
                        <span><?=$model->hr_getsubject_date;?></span>
                    </h3>

                    <div class="timeline-body">
                        <?=$model->step1_comment;?>
                    </div>
                </div>
            </div>
            <?php endif;?>
            <!-- END timeline item -->



            <!-- timeline item -->
            <?php if(!is_null($model->step2)):?>
            <div data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">
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
            <?php if(!is_null($model->step3)):?>
            <div data-aos="fade-up" data-aos-delay="300" data-aos-duration="1000">
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
            <?php if(!is_null($model->step4)):?>
            <div data-aos="fade-up" data-aos-delay="400" data-aos-duration="1000">
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
            <?php if(!is_null($model->step5)):?>
            <div data-aos="fade-up" data-aos-delay="500" data-aos-duration="1000">
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
            <?php if(!is_null($model->step6)):?>
            <div data-aos="fade-up" data-aos-delay="600" data-aos-duration="1000">
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
            <?php if(!is_null($model->step7)):?>
            <div data-aos="fade-up" data-aos-delay="700" data-aos-duration="1000">
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
            <?php if(!is_null($model->step8)):?>
            <div data-aos="fade-up" data-aos-delay="800" data-aos-duration="1000">
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


    <div data-aos="fade-up" data-aos-offset="200" data-aos-delay="50" data-aos-duration="1000"
        data-aos-easing="ease-in-out" data-aos-mirror="true" data-aos-once="false"
        data-aos-anchor-placement="top-center">
    </div>

    <?php
$js = <<< JS
    // AOS.init();
    AOS.init({
  // Global settings:
  disable: false, // accepts following values: 'phone', 'tablet', 'mobile', boolean, expression or function
  startEvent: 'DOMContentLoaded', // name of the event dispatched on the document, that AOS should initialize on
  initClassName: 'aos-init', // class applied after initialization
  animatedClassName: 'aos-animate', // class applied on animation
  useClassNames: false, // if true, will add content of `data-aos` as classes on scroll
  disableMutationObserver: false, // disables automatic mutations' detections (advanced)
  debounceDelay: 50, // the delay on debounce used while resizing window (advanced)
  throttleDelay: 99, // the delay on throttle used while scrolling the page (advanced)
  

  // Settings that can be overridden on per-element basis, by `data-aos-*` attributes:
  offset: 120, // offset (in px) from the original trigger point
  delay: 0, // values from 0 to 3000, with step 50ms
  duration: 400, // values from 0 to 3000, with step 50ms
  easing: 'ease', // default easing for AOS animations
  once: false, // whether animation should happen only once - while scrolling down
  mirror: false, // whether elements should animate out while scrolling past them
  anchorPlacement: 'top-bottom', // defines which position of the element regarding to window should trigger the animation

});
JS;
$this->registerJS($js);
    ?>