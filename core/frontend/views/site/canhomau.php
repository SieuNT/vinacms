<?php
use yii\helpers\Html;
use yii\web\View;

$this->title = 'Căn hộ mẫu 1 phòng ngủ dự án The Gold View';
?>
<div class="content-wrap">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-title">Căn hộ mẫu</h1>
                <div class="desc-wrap">
                    <ul class="canhomau-menu">
                        <li><?= Html::a('CH 1 Phòng Ngủ', ['site/can-ho-mau']) ?></li>
                        <li><?= Html::a('CH 2 Phòng Ngủ', ['site/can-ho-mau-2-phong-ngu']) ?></li>
                        <li><?= Html::a('CH 3 Phòng Ngủ', ['site/can-ho-mau-3-phong-ngu']) ?></li>
                    </ul>
                    <div class="slicks">
                        <div><?= Html::img('/themes/goldview/demo/1phongngu/1.jpg', ['class' => 'img-responsive center-block text-center']) ?></div>
                        <div><?= Html::img('/themes/goldview/demo/1phongngu/2.jpg', ['class' => 'img-responsive center-block text-center']) ?></div>
                        <div><?= Html::img('/themes/goldview/demo/1phongngu/3.jpg', ['class' => 'img-responsive center-block text-center']) ?></div>
                        <div><?= Html::img('/themes/goldview/demo/1phongngu/4.jpg', ['class' => 'img-responsive center-block text-center']) ?></div>
                        <div><?= Html::img('/themes/goldview/demo/1phongngu/5.jpg', ['class' => 'img-responsive center-block text-center']) ?></div>
                        <div><?= Html::img('/themes/goldview/demo/1phongngu/6.jpg', ['class' => 'img-responsive center-block text-center']) ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php

$js = <<<JS
    $('.slicks').slick({
      dots: true,
      infinite: true,
      speed: 500,
      fade: true,
      autoplay: true,
      lazyLoad: 'ondemand',
      autoplaySpeed: 2000,
      cssEase: 'linear'
    });
JS;
$this->registerJs($js, View::POS_END);