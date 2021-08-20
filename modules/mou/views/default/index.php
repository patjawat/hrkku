<?php
use yii\bootstrap4\LinkPager;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\Pjax;
$this->title = "ระบบติดตามและตรวจสอบ";
$this->params['breadcrumbs'][] = "การตรวจร่างบันทึกข้อตกลง (MOA) และบันทึกความเข้าใจ (MOU)";
$assetDir = Yii::$app->assetManager->getPublishedUrl('@vendor/almasaeed2010/adminlte/dist');

?>

<?php Pjax::begin(['id' => 'employee-container']);?>
<div class="mou-default-index mb-4">


    <div class="row">
        <div class="col">

        </div>
        <div class="col-md-auto">
            <form class="form-inline ml-0 ml-md-3">
                <div class="input-group input-group-sm">
                    <input class="form-control" type="search" placeholder="ค้นหา" aria-label="Search">
                    <div class="input-group-append">
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>

<?php foreach ($dataProvider->getModels() as $model): ?>
<div class="card card-widget collapsed-card">
    <div class="card-header">
        <div class="user-block">
            <img class="img-circle" src="<?=$assetDir?>/img/user1-128x128.jpg" alt="User Image">
            <span class="username"><a href="#"><?=$model->topic;?></a></span>
            <span class="description">รับเรื่อง <?=$model->created_at;?></span>
        </div>
        <!-- /.user-block -->
        <div class="card-tools">
            <button type="button" class="btn btn-tool" title="Mark as read">
                <i class="far fa-circle"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-plus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <!-- /.card-tools -->
    </div>
    <!-- /.card-header -->
    <div class="card-body" style="display: none;">
        <p>I took this photo this morning. What do you guys think?</p>
        <button type="button" class="btn btn-default btn-sm"><i class="fas fa-share"></i> Share</button>
        <button type="button" class="btn btn-default btn-sm"><i class="far fa-thumbs-up"></i> Like</button>
        <span class="float-right text-muted">พิจราณาภายใน <?=$model->level;?> วันทำการ</span>
    </div>
  

</div>

<?php endforeach;?>
<?php
$dataProvider->getCount();
echo LinkPager::widget(['pagination' => $dataProvider->getPagination()]);
?>
<?php Pjax::end();?>