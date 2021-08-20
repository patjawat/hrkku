<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;


$this->title = 'ระบบติดตามและตรวจสอบ';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php
$layout = <<< HTML
<div class="clearfix"></div>
<div class="card">
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
      'attribute' => 'topic',
      'value' => function ($model, $key, $index, $widget) {
        return $model->topic;
      }
  ],
  [
    'attribute' => 'department',
    'value' => function ($model, $key, $index, $widget) {
      return $model->department;
    }
],
[
    'attribute' => 'created_by',
    'value' => function ($model, $key, $index, $widget) {
      return $model->author->fullname;
    }
],
[
    'attribute' => 'contact',
    'value' => function ($model, $key, $index, $widget) {
      return $model->contact;
    }
],
[
                'attribute' => 'expire',
                'value' => function($model){
                    return $model->expire;
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


<div class="mou-index">

    <p>
        <?= Html::a('<i class="fas fa-plus"></i> สร้างใหม่', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php
    
    // GridView::widget([
    //     'dataProvider' => $dataProvider,
    //     'filterModel' => $searchModel,
    //     'columns' => [
    //         ['class' => 'yii\grid\SerialColumn'],

    //         // 'id',
    //         'topic',
    //         'department',
    //         'created_by',
    //         [ 
    //             'attribute' => 'author_id', 
    //             'value' => function($model){
    //                 return $model->author->username;
    //             }
                
    //         ], 
    //         'contact',
    //         'date_start',
    //         // 'level',
    //         [
    //             'attribute' => 'พิรณาภายในวันทำการ',
    //             'value' => function($model){
    //                 return $model->expire;
    //             }
    //         ],
    //         'results',
    //         //'date_end',
    //         //'create_by',
    //         //'update_by',
    //         //'updated_at',
    //         //'created_at',

    //         // ['class' => 'yii\grid\ActionColumn'],
    //         [
    //             'class' => 'kartik\grid\ActionColumn',
    //             'width' => '140px;',
    //             'template'=>'{copy} {view} {update} {delete}',
    //             'buttons'=>[
    //               'view' => function($url,$model,$key){
    //                   return Html::a('<i class="fas fa-eye"></i>',$url,['class' =>'btn btn-sm btn-success']);
    //                 },
    //                 'update' => function($url,$model,$key){
    //                     return Html::a('<i class="far fa-edit"></i>',$url,['class' =>'btn btn-sm btn-warning']);
    //                   },
    //                   'delete' => function($url,$model,$key){
    //                     return Html::a('<i class="fas fa-trash"></i>',$url,['class' =>'btn btn-sm btn-danger']);
    //                   }
    //               ]
    //           ],
    //     ],
    // ]); 
    ?>

    <?php Pjax::end(); ?>

</div>
