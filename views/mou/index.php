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
        <?php if(!Yii::$app->user->isGuest):?>
<?=Html::a('<i class="fas fa-plus"></i> สร้างใหม่', ['create'], ['class' => 'btn btn-success'])?>
<?php endif;?>
        </div>
        <div class="col-md-auto">
<?=$this->render('_search', ['model' =>$searchModel])?>
           
        </div>
    </div>

</div>
<?php foreach ($dataProvider->getModels() as $model): ?>
<div class="card card-widget collapsed-card shadow">
    <div class="card-header">
        <div class="user-block">
            <img class="img-circle" src="<?=$assetDir?>/img/user1-128x128.jpg" alt="User Image">
            <!-- <i class="far fa-grin-wink fa-lg"></i> -->
            <span class="username"><a href="#" style="color:#d06149;"><?=$model->topic;?></a></span>
            <span class="description">รับเรื่อง <?=$model->created_at;?></span>
        </div>
        <!-- /.user-block -->
        <div class="card-tools">
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

        <p>xxxxxxxx</p>
        <?= Html::a('<i class="far fa-edit"></i> แก้ไข', ['update', 'id' => $model->id], ['class' => 'btn btn-sm btn-primary']) ?>
        <!-- <button type="button" class="btn btn-sm btn-default btn-sm"><i class="far fa-thumbs-up"></i> Like</button> -->
        <span class="float-right text-muted">พิจราณาภายใน <?=$model->level;?> วันทำการ</span>
    </div>
  

</div>

<?php endforeach;?>
<?php
$dataProvider->getCount();
echo LinkPager::widget(['pagination' => $dataProvider->getPagination()]);
?>
<?php Pjax::end();?>