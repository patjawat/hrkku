<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\TrackingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ผู้ขอกำหนดตำแหน่งทางวิชาการ';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php
$layout = <<< HTML
<div class="clearfix"></div>
<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-list-ul"></i> รายการ{$this->title}</h3>

                <div class="card-tools">
                 <div style="width: 400px;">
                    {$this->render('_search', ['model' =>$searchModel])}
                  </div> 
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 500px;">
              {items}
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-left">
                {summary}
                </ul>
                <ul class="pagination pagination-sm m-0 float-right">       
                  {pager}
                </ul>
              </div>
            </div>

HTML;

?>

<?= GridView::widget([
  'id' => 'user-grid',
  'dataProvider' => $dataProvider,
  //   'filterModel' => $searchModel,
  'pjax' => true,
  'showHeader' => true,
  'showPageSummary' => false,
  'layout' => '{items}{pager}',
  'floatHeader' => true,
  'floatHeaderOptions' => ['scrollingTop' => '20'],
  'perfectScrollbar' => true,
  'footerRowOptions' => ['style' => 'font-weight:bold;text-decoration: underline; position: absolute'],
  'layout' => $layout,
  'columns' => [
    [
      'class'=>'kartik\grid\SerialColumn',
      'contentOptions'=>['class'=>'kartik-sheet-style'],
      'width'=>'36px',
      'pageSummary'=>'Total',
      'pageSummaryOptions' => ['colspan' => 6],
      'header'=>'',
      'headerOptions'=>['class'=>'kartik-sheet-style']
  ],
    [
      'attribute' => 'username',
      'format' => 'html',
      'header' =>'<i class="far fa-user"></i> | ชื่อ-นามสกุล',
      'value' => function ($model, $key, $index, $widget) {
          return $model->pname.$model->fname.' '.$model->lname.' <br>สังกัด <code>'.$model->affiliation.'</code> <br>ขอกำหนดตำแหน่ง : <code>'.$model->positionname->name.'</code> <br>ในสาขาวิชา : <code>'.$model->branch.'</code>';
      }
  ],
  [
    // 'attribute' => 'email',
    'format' => 'raw',
    'header' =>'<i class="fas fa-address-card"></i> | ผู้ทรงคุณวุฒิประเมินผลงานทางวิชาการ',
    'value' => function ($model, $key, $index, $widget) {
        // return $model->fullname;
        return $this->render('reader_view', ['model' => $model]);
    }
],
[
    'attribute' => 'created_at',
    'header' => '<i class="fas fa-tasks"></i> การดำเนินงาน',
    'format' => 'html',
  //   'filter' => $searchModel->itemStatus,
    'value' => function ($model) {
      // return Yii::$app->thaiFormatter->asDateTime($model->created_at, 'short');
        return '<div class="progress progress-sm">
        <div class="progress-bar bg-green" role="progressbar" aria-valuenow="57" aria-valuemin="0" aria-valuemax="100" style="width: 57%">
        </div>
    </div><small>
    57% Complete
</small>';
    }
  ],
    [
      'attribute' => 'status',
      'class' => 'kartik\grid\BooleanColumn',
      'vAlign' => 'middle',
      'header' => '<i class="fas fa-unlock-alt"></i> สถานะ',
      'format' => 'html',
    //   'filter' => $searchModel->itemStatus,
      'value' => function ($model) {
        // return $model->statusName == 'Active' ? '<span class="text-success">' . $model->statusName . '</span>' : $model->statusName;
        return '<span class="badge badge-success">Success</span>';
    }
    ],
    // 'created_at:dateTime',

    [
      'class' => 'app\modules\usermanager\grid\ActionColumn',
      'header' => '<center>ดำเนินการ<center>',
      'width' => '130px',
      'dropdown' => false,
      'vAlign' => 'middle',
    ],

  ],
]); ?>
