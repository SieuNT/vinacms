<?php

namespace vinacms\tools\elfinder;


use yii\web\AssetBundle;

class AssetsCallBack extends AssetBundle{
	public $js = array(
		'elfinder.callback.js'
	);
	public $depends = array(
		'yii\web\JqueryAsset'
	);

	public function init()
	{
		$this->sourcePath = __DIR__."/assets";
		parent::init();
	}
} 