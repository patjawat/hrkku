<?php
/* @var $this yii\web\View */
use miloschuman\highcharts\Highcharts;

?>

<?php
echo Highcharts::widget([
    'options' => [
       'title' => ['text' => 'Fruit Consumption'],
       'xAxis' => [
          'categories' => ['Apples', 'Bananas', 'Oranges']
       ],
       'yAxis' => [
          'title' => ['text' => 'Fruit eaten']
       ],
       'series' => [
          ['name' => 'Jane', 'data' => [1, 0, 4]],
          ['name' => 'John', 'data' => [5, 7, 3]]
       ]
    ]
 ]);
?>