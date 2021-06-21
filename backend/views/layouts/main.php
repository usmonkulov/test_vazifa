<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use common\models\User;
use yii\bootstrap\Dropdown;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use yii\helpers\Url;

AppAsset::register($this);

$userName = Yii::$app->user->identity['username'];

$userId = Yii::$app->user->identity->id;
$model = User::findOne($userId);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

 <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      <a href="/admin" class="logo"><b>ADMI<span>NKA</span></b></a>
      <!--logo end-->
      <div class="top-menu">
          <?php if(!Yii::$app->user->isGuest): ?>
          <ul class="nav pull-right top-menu navbar-right">
                <li>
                <a class="logout dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="true">
                <span class="fa fa-user"></span>
                </a>
                    <?php
                    echo Dropdown::widget([
                        'options' => [
                            'style' => 'left: -103px;'
                        ],
                        'items' => [
                            '<li>
                                <a>
                                <b style="margin-left: 5px">'.$userName.'</b>
                                </a>
                            </li>',
                            '<li class="divider"></li>',
                            '<li><a data-method="POST" href="'.Url::to(['user/'.$userId]).'"><b>Mening profilim</b></a></li>',
                            '<li><a data-method="POST" href="'.Url::to(['site/logout']).'"><b> Chiqish</b></a></li>',
                        ],
                    ]);
                    ?>
               </li>
            </ul>
          <?php endif?>
      </div>
    </header>
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered">
            <a href="<?= \yii\helpers\Url::to(['user/'.$userId])?>">
              <?php if($file = $model->getImage()):?>
                  <?= Html::img($file->getUrl('80x80'),['class' => 'img-circle','alt' => $userName])?>
              <?php endif?>
            </a>
          </p>
          <h5 class="centered"><?= $userName?></h5>
          <?php $controller = Yii::$app->controller->id; ?>
                <li class="mt">
                    <a class="<?= ($controller=='site')?'active':''?>" href="/admin">
                        <i class="fa fa-home"></i>
                        <span>Bosh sahifa</span>
                    </a>
                </li>

                <li>
                    <a  class="<?= ($controller=='user')?'active':''?>"  href="<?= Url::to(['user/'])?>">
                        <i class="fa fa-users"></i>
                        <span>Foydalanuvchilar</span>
                    </a>
                </li>

                <li>
                    <a  class="<?= ($controller=='nomzod')?'active':''?>"  href="<?= Url::to(['nomzod/'])?>">
                        <i class="fa fa-list-alt"></i>
                        <span>Nomzodlar</span>
                    </a>
                </li>
          
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <!-- BREADCRUMBS AREA START -->
        <h1 class="breadcrumbs-title"></h1>
        <?php try {
            echo Breadcrumbs::widget([
                'homeLink' => ['label' => '<i class="fa fa-home"></i> Bosh sahifa', 'url' => Yii::$app->urlManager->createUrl("/")],
                'tag' => 'ol',
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                'options' => ['class' => 'breadcrumb panel'],
                'encodeLabels' => false
            ]);
        } catch ( Exception $e ) {
            echo $e->getMessage();
        } ?>

        <!-- BREADCRUMBS AREA END -->
        <?= $content ?>
      </section>
    </section>
  </section>
   <!--main content end-->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
