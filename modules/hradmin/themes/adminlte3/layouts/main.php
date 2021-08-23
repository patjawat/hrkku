<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;

\hail812\adminlte3\assets\FontAwesomeAsset::register($this);
\hail812\adminlte3\assets\AdminLteAsset::register($this);
$this->registerCssFile('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback');

$assetDir = Yii::$app->assetManager->getPublishedUrl('@vendor/almasaeed2010/adminlte/dist');
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<style>

html,body,.h1, .h2, .h3, .h4, .h5, .h6, h1, h2, h3, h4, h5, h6,.btn ,.table{
    font-family: 'Kanit', sans-serif;
}
.wrapper{
    background-image: url("/images/bg.jpg");
    background-repeat: repeat-y;
}
.h1, .h2, .h3, .h4, .h5, .h6, h1, h2, h3, h4, h5, h6 {

    font-weight: 400 !important;
}
.btn,.table,a,label{
    font-weight: 400 !important;
}
.table-bordered thead td, .table-bordered thead th {
    border-bottom-width: 2px;
    font-weight: 400 !important;
}

.table th, .table td {
    font-weight: 400;
}


.content-wrapper {
    font-weight: 400;
    background: linear-gradient(100deg, rgb(167 57 37 / 56%) 50%,#b549339c 0);
    /* background: linear-gradient(100deg, rgb(182, 40, 111) 50%, #ac2066 0); */
    /* background: linear-gradient(100deg, rgb(167 57 37) 50%,#b54933 0); */
    /* height: 100%;
    margin: 0;
    padding: 0; */
   
    /* background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab); */
    /* background-size: 400% 400%;
    animation: gradient 15s ease infinite; */
    /* background-image: linear-gradient(-225deg, #FF057C 0%, #8D0B93 50%, #321575 100%); */
    /* background-image: linear-gradient(to top, #e8198b 0%, #c7eafd 100%); */
    /* background-image: linear-gradient(-90deg, #5f72bd 0%, #9b23ea 100%); */
    
    /* background: linear-gradient(100deg, rgb(182, 40, 111) 50%, #a73b24 0); */
    /* background-image: linear-gradient(to right top, #2d0036, #4a1a0f, #692719, #883220, #a73b24); */

    
    /* background-image: url("/images/bg.png"); */
    /* background-repeat: no-repeat;
  background-attachment: fixed;  
  background-size: cover;
  filter: opacity(opacity: 30%); */
}

/* background: linear-gradient(100deg, rgb(182, 40, 111) 50%, #ac2066 0); */
.form-dark {
    display: block;
    width: 100%;
    padding: .375rem .75rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #fcfdff;
    background-color: #495057;
    background-clip: padding-box;
    border: 1px solid #495057;
    border-radius: .25rem;
    transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
}
.widget-user .widget-user-image {
    left: 21%;
    margin-left: -45px;
    position: absolute;
    top: 80px;
}

</style>
<body class="layout-top-nav dark-mode">
<?php $this->beginBody() ?>

<div class="wrapper">
    <!-- Navbar -->
    <?= $this->render('navbar', ['assetDir' => $assetDir]) ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <?php // $this->render('sidebar', ['assetDir' => $assetDir]) ?>

    <!-- Content Wrapper. Contains page content -->
    <?= $this->render('content', ['content' => $content, 'assetDir' => $assetDir]) ?>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <?= $this->render('control-sidebar') ?>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <?= $this->render('footer') ?>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
