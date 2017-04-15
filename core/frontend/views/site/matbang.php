<?php
use yii\helpers\Html;
use yii\web\View;

$this->title = 'Mặt bằng dự án The Gold View';
?>
<div class="content-wrap">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-title">Mặt bằng</h1>
                <div class="desc-wrap">
                    <div class="matbang-menu-1">
                        <ul>
                            <li><a href="javascript:;" class="block_a">Block A</a></li>
                            <li><a href="javascript:;" class="block_b">Block B</a></li>
                        </ul>
                    </div>
                    <div class="matbang-menu-2">
                        <ul>
                            <li><a href="javascript:;" class="block_a_tang_6">Tầng 6</a></li>
                            <li><a href="javascript:;" class="block_a_tang_724">Tầng 7 - 24</a></li>
                            <li><a href="javascript:;" class="block_a_tang_2533">Tầng 25 - 33</a></li>
                        </ul>
                    </div>
                    <div class="block_a_tang_6_content">
                        <h2>MẶT BẰNG CĂN HỘ</h2>
                        <h2>THÁP A: TẦNG 06</h2>
                        <p>Mặt bằng căn hộ Tháp A - Tầng 06 được thiết kế thông thoáng và hớp lý với 09 loại căn hộ diện tích khác nhau</p>
                        <div class="row">
                            <div class="col-xs-4"><?= Html::img('/themes/goldview/demo/matbang/list_block_a_tang_6.jpg', ['class' => 'img-responsive center-block text-center']) ?></div>
                            <div class="col-xs-8"><?= Html::img('/themes/goldview/demo/matbang/img_block_a_tang_6.jpg', ['class' => 'img-responsive center-block text-center']) ?></div>
                        </div>
                    </div>
                    <div class="block_a_tang_724_content">
                        <h2>MẶT BẰNG CĂN HỘ</h2>
                        <h2>THÁP A: TẦNG 07 - 24</h2>
                        <p>Mặt bằng căn hộ Tháp A: Tầng 07 – Tầng 24 được thiết kế thông thoáng và hợp lý với 13 loại căn hộ diện tích khác nhau.</p>
                        <div class="row">
                            <div class="col-xs-4"><?= Html::img('/themes/goldview/demo/matbang/list_block_a_tang_724.jpg', ['class' => 'img-responsive center-block text-center']) ?></div>
                            <div class="col-xs-8"><?= Html::img('/themes/goldview/demo/matbang/img_block_a_tang_724.jpg', ['class' => 'img-responsive center-block text-center']) ?></div>
                        </div>
                    </div>
                    <div class="block_a_tang_2533_content">
                        <h2>MẶT BẰNG CĂN HỘ</h2>
                        <h2>THÁP A: TẦNG 25 - 33</h2>
                        <p>Mặt bằng căn hộ Tháp A: Tầng 25 - Tầng 33 được thiết kế thông thoáng và hợp lý với 10 loại căn hộ diện tích khác nhau.</p>
                        <div class="row">
                            <div class="col-xs-4"><?= Html::img('/themes/goldview/demo/matbang/list_block_a_tang_2533.jpg', ['class' => 'img-responsive center-block text-center']) ?></div>
                            <div class="col-xs-8"><?= Html::img('/themes/goldview/demo/matbang/img_block_a_tang_2533.jpg', ['class' => 'img-responsive center-block text-center']) ?></div>
                        </div>
                    </div>
                    <div class="block_b__27_tang_content">
                        <h2>MẶT BẰNG CĂN HỘ</h2>
                        <h2>THÁP B: 27 TẦNG</h2>
                        <p>Mặt bằng căn hộ Tháp B được thiết kế thông thoáng và hợp lý với 5 loại diện tích căn hộ:</p>
                        <div class="row">
                            <div class="col-xs-4"><?= Html::img('/themes/goldview/demo/matbang/list_block_b_27_tang.jpg', ['class' => 'img-responsive center-block text-center']) ?></div>
                            <div class="col-xs-8"><?= Html::img('/themes/goldview/demo/matbang/img_block_b_27_tang.jpg', ['class' => 'img-responsive center-block text-center']) ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php

$js = <<<JS
    $(document).ready(function() {
        $('.block_a_tang_724_content, .block_a_tang_2533_content, .block_b__27_tang_content').hide();
        $('.block_a').click(function() {
            $('.block_a_tang_6_content, .matbang-menu-2').show();
            $('.block_a_tang_724_content, .block_a_tang_2533_content, .block_b__27_tang_content').hide();
        });
        
        $('.block_b').click(function() {
            $('.block_b__27_tang_content').show();
            $('.block_a_tang_724_content, .block_a_tang_2533_content, .block_a_tang_6_content, .matbang-menu-2').hide();
        });
        
        $('.block_a_tang_6').click(function() {
            $('.block_a_tang_6_content').show();
            $('.block_a_tang_724_content, .block_a_tang_2533_content, .block_b__27_tang_content').hide();
        });
        
        $('.block_a_tang_724').click(function() {
            $('.block_a_tang_724_content').show();
            $('.block_b__27_tang_content, .block_a_tang_2533_content, .block_a_tang_6_content').hide();
        });
        
        $('.block_a_tang_2533').click(function() {
            $('.block_a_tang_2533_content').show();
            $('.block_b__27_tang_content, .block_a_tang_724_content, .block_a_tang_6_content').hide();
        });
    });
JS;
$this->registerJs($js, View::POS_END);