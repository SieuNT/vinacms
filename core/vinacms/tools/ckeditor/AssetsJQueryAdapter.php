<?php

namespace vinacms\tools\ckeditor;

use yii\web\AssetBundle;


class AssetsJQueryAdapter extends AssetBundle{

	public $sourcePath = '@mihaildev/ckeditor/editor/adapters';

    public $js = [
        'jquery.js',
    ];

    public $depends = [
        'yii\web\JqueryAsset',
        'mihaildev\ckeditor\Assets'
    ];
}