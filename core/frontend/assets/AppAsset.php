<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        '/themes/goldview/css/fonts/fonts.css',
        '/themes/goldview/slick/slick.css',
        '/themes/goldview/slick/slick-theme.css',
        '/themes/goldview/css/style.css',
    ];
    public $js = [
        '/themes/goldview/slick/slick.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
