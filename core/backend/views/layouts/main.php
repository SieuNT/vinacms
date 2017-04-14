<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?> | VinaCMS</title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<!-- Aside Start-->
<aside class="left-panel">
    <!-- brand -->
    <div class="logo">
        <?= Html::a('<i class="ion-android-globe"></i> <span class="nav-label">VinaCMS</span>', ['site/index'], ['class' => 'logo-expanded']) ?>
    </div>
    <nav class="navigation">
        <!-- / brand -->
        <?= \vinacms\admin\MenuAside::widget([
            'items' => [
                ['label' => 'Bảng điều khiển', 'url' => ['site/index'], 'icon' => 'ion-home'],
                ['label' => 'Nội dung', 'url' => ['post/index'], 'items' => [
                    ['label' => 'Danh mục', 'url' => ['post-category/index']],
                    ['label' => 'Bài viết', 'url' => ['post/index']],
                    ['label' => 'Trang', 'url' => ['page/index']],
                ]],
                ['label' => 'Thành viên', 'url' => ['user/index'], 'items' => [
                    ['label' => 'Thành viên', 'url' => ['user/index']],
                    ['label' => 'Phân quyền', 'url' => ['rbac/index']],
                ]],
                ['label' => 'Cấu hình', 'url' => ['setting/index'], 'items' => [
                    ['label' => 'Cấu hình chung', 'url' => ['setting/index']],
                    ['label' => 'Tỉnh/TP - Quốc gia', 'url' => ['country/index'], 'items' => [
                        ['label' => 'Quốc gia', 'url' => ['country/index']],
                        ['label' => 'Vùng - Miền', 'url' => ['country-state/index']],
                        ['label' => 'Tỉnh - Thành phố', 'url' => ['country-city/index']],
                        ['label' => 'Quận - Huyện', 'url' => ['country-district/index']],
                    ]],
                ]],
            ],
        ]);
        ?>
    </nav>
</aside>
<section class="content">
    <header class="top-head container-fluid">
        <button type="button" class="navbar-toggle pull-left">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <!-- Left navbar -->
        <nav class=" navbar-default" role="navigation">
            <!--            <ul class="nav navbar-nav hidden-xs">-->
            <!--                <li class="dropdown">-->
            <!--                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">English <span class="caret"></span></a>-->
            <!--                    <ul role="menu" class="dropdown-menu">-->
            <!--                        <li><a href="#">German</a></li>-->
            <!--                        <li><a href="#">French</a></li>-->
            <!--                        <li><a href="#">Italian</a></li>-->
            <!--                        <li><a href="#">Spanish</a></li>-->
            <!--                    </ul>-->
            <!--                </li>-->
            <!--            </ul>-->

            <!-- Right navbar -->
            <ul class="nav navbar-nav navbar-right top-menu top-right-menu">
                <!-- mesages -->
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <i class="fa fa-envelope-o text-info"></i>
                    </a>
                    <ul class="dropdown-menu extended nicescroll" tabindex="5001">
                        <li>
                            <p>Email Marketing</p>
                        </li>
                        <li>
                            <a href="#">
                                <span class="block"><strong>John smith</strong></span>
                                <span class="media-body block">New tasks needs to be done<br><small class="text-muted">10 seconds ago</small></span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="block"><strong>John smith</strong></span>
                                <span class="media-body block">New tasks needs to be done<br><small class="text-muted">10 seconds ago</small></span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="block"><strong>John smith</strong></span>
                                <span class="media-body block">New tasks needs to be done<br><small class="text-muted">10 seconds ago</small></span>
                            </a>
                        </li>
                        <li>
                            <p><a href="#" class="text-right">Xem tất cả liên hệ</a></p>
                        </li>
                    </ul>
                </li>
                <!-- /messages -->
                <!-- user login dropdown start-->
                <li class="dropdown text-center">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <?= Html::img('/admin/img/logo.gif', ['class' => 'img-circle profile-img thumb-sm']) ?>
                        <span class="username"><?= Yii::$app->user->identity->full_name; ?></span> <span
                                class="caret"></span>
                    </a>
                    <ul class="dropdown-menu pro-menu" tabindex="5003" style="overflow: hidden; outline: none;">
                        <li><a href="#"><i class="fa fa-briefcase"></i>Hồ sơ</a></li>
                        <li>
                            <?= Html::beginForm(['/site/logout'], 'post') . Html::submitButton(
                                '<i class="fa fa-sign-out"></i> Thoát',
                                ['class' => 'btn btn-link btn-logout']
                            ) . Html::endForm(); ?>
                        </li>
                    </ul>
                </li>
                <!-- user login dropdown end -->
            </ul>
            <!-- End right navbar -->
        </nav>

    </header>
    <div class="wraper container-fluid">
        <div class="page-title">
            <h3 class="title"><?= Html::encode($this->title); ?></h3>
        </div>

        <div class="panel panel-color panel-inverse">
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
    </div>
    <footer class="footer">
        2017@VinaCMS
    </footer>
</section>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
