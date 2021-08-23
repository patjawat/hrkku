<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;

$this->title = 'คณะกรรมการผู้ทรงคุณวุฒิ';
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
//   'id' => 'user-grid',
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
          return $model->fname.' '.$model->lname;
      }
  ],
  [
    'attribute' => 'position',
    'format' => 'raw',
    'header' =>'<i class="fas fa-address-card"></i> | ตำแหน่ง',
    'value' => function ($model, $key, $index, $widget) {
        return $model->position;
    }
],
    [
      'class' => 'app\modules\usermanager\grid\ActionColumn',
      'header' => '<center>ดำเนินการ<center>',
      'width' => '130px',
      'dropdown' => false,
      'vAlign' => 'middle',
    ],
    
    ],
]); ?>



</div>
