<?php

use yii\helpers\Html;
use yii\helpers\Url;
?>
<!-- Navbar -->
<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
    
      <a href="<?=Url::home()?>" class="navbar-brand">
        <img src="<?=$assetDir?>/img/AdminLTELogo.png"  alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Human Resource Division</span>
      </a>

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
          <a href="<?=\yii\helpers\Url::to("/hradmin")?>" class="nav-link"><i class="fas fa-tachometer-alt"></i> admin</a>
          </li>
          <li class="nav-item">
          <a href="<?=\yii\helpers\Url::to("/profile")?>" class="nav-link"><i class="fas fa-tachometer-alt"></i> profile</a>
          </li>

        </ul>

       
      </div>

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <!-- SEARCH FORM -->
        <?php if(Yii::$app->user->isGuest):?>
        <?=Html::a('<i class="fas fa-fingerprint"></i> เข้าสู่ระบบ',['/site/login'],['class' => 'btn btn-primary'])?>
          <?php else:?>
        <?= Html::a('<i class="fas fa-power-off"></i> ออกจากระบบ', ['/site/logout'], [
    'data' => [
        'method' => 'post',
        'confirm' => 'ออกจากระบบ',
    ],
    'class' => 'btn btn-danger btn-block'
]) ?>
<?php endif;?>
      </ul>
    </div>
  </nav>
<!-- /.navbar -->