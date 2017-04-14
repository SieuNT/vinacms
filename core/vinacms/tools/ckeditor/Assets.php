<?php

namespace vinacms\tools\ckeditor;

use yii\web\AssetBundle;

class Assets extends AssetBundle{
	public $sourcePath = '@vinacms/tools/ckeditor/editor';

    public $js = [
        'ckeditor.js',
		'js.js',
    ];

	public $depends = [
		'yii\web\YiiAsset',
	];
}