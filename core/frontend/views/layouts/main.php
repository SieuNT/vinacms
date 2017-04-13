<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
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
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="navigation">
    <div class="container">
        <div class="col-lg-5">
            <div class="menu-top-left pull-right">
                <ul class="menu-top">
                    <li><?=Html::a('Giới thiệu', ['site/index']) ?></li>
                    <li><?=Html::a('Vị trí', ['site/vi-tri']) ?></li>
                    <li><?=Html::a('Mặt bằng', ['site/mat-bang']) ?></li>
                    <li><?=Html::a('Tiện ích', ['site/tien-ich']) ?></li>
                </ul>
            </div>
        </div>
        <div class="col-lg-2">
            <div class="logo-wrap center-block text-center">
                <?= Html::a(Html::img('/themes/goldview/img/logo.png', ['class' => 'logo img-responsive center-block text-center']), '/') ?>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="menu-top-left pull-left">
                <ul class="menu-top">
                    <li><?=Html::a('Căn hộ mẫu', ['site/can-ho-mau']) ?></li>
                    <li><?=Html::a('Tiến độ', ['site/tien-do']) ?></li>
                    <li><?=Html::a('Thanh toán & Ưu đãi', ['site/thanh-toan-uu-dai']) ?></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="slides-home">
    <div class="container">
    <div class="col-lg-8">
        <?= Html::img('/themes/goldview/img/slides-home-discount-1.png', ['class' => 'discount-1 img-responsive']) ?>
        <?= Html::img('/themes/goldview/img/slides-home-discount-2.png', ['class' => 'discount-2 img-responsive']) ?>
    </div>
    <div class="col-lg-4">
        <div class="slides-home--title">
            <?= Html::img('/themes/goldview/img/slides-home-title.png', ['class' => 'img-responsive center-block text-center']) ?>
        </div>
        <div class="register-wrap">
            <p><?= Html::img('/themes/goldview/img/register-title.png', ['class' => 'img-responsive center-block text-center']) ?></p>
            <form role="form" class="register-form form-footer form-horizontal" data-index="1" action=""
                  method="post">
                <div class="col-sm-12">
                    <div class="form-group">
                        <div class="msg_form" id="msg_form_1"></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <input type="text" name="Mailbox[name]" placeholder="HỌ VÀ TÊN"
                               class="fullname form-control"/>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <input type="text" name="Mailbox[phone]" placeholder="SỐ ĐIỆN THOẠI"
                               class="email form-control"/>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <input type="text" name="Mailbox[email]" placeholder="EMAIL" class="email form-control"/>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <div class="center-block text-center">
                            <input type="hidden" name="Mailbox[secret_key]" value="01b2e0b33693c9ba42cf1204f37fcf55b2b1529ed4395e3754f341a243391a62"/>
                            <button id="btn_register_1" class="btn-register"><?= Html::img('/themes/goldview/img/btn-register.png', ['class' => 'img-responsive']) ?></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
</div>
<?= $content ?>
<div class="slides-footer">
    <div class="container">
        <div class="col-lg-8">
            <?= Html::img('/themes/goldview/img/slides-footer-title.png', ['class' => 'slides-footer--title img-responsive center-block text-center']) ?>
        </div>
        <div class="col-lg-4">
            <div class="register-wrap">
                <p><?= Html::img('/themes/goldview/img/register-title.png', ['class' => 'img-responsive center-block text-center']) ?></p>
                <form role="form" class="register-form form-footer form-horizontal" data-index="1" action=""
                      method="post">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <div class="msg_form" id="msg_form_1"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input type="text" name="Mailbox[name]" placeholder="HỌ VÀ TÊN"
                                   class="fullname form-control"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input type="text" name="Mailbox[phone]" placeholder="SỐ ĐIỆN THOẠI"
                                   class="email form-control"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input type="text" name="Mailbox[email]" placeholder="EMAIL" class="email form-control"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="center-block text-center">
                                <input type="hidden" name="Mailbox[secret_key]" value="01b2e0b33693c9ba42cf1204f37fcf55b2b1529ed4395e3754f341a243391a62"/>
                                <button id="btn_register_1" class="btn-register"><?= Html::img('/themes/goldview/img/btn-register.png', ['class' => 'img-responsive']) ?></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
