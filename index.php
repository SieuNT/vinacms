<?php
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

require(__DIR__ . '/core/vendor/autoload.php');
require(__DIR__ . '/core/vendor/yiisoft/yii2/Yii.php');
require(__DIR__ . '/core/common/config/bootstrap.php');
require(__DIR__ . '/core/frontend/config/bootstrap.php');

$config = yii\helpers\ArrayHelper::merge(
    require(__DIR__ . '/core/common/config/main.php'),
    require(__DIR__ . '/core/common/config/main-local.php'),
    require(__DIR__ . '/core/frontend/config/main.php'),
    require(__DIR__ . '/core/frontend/config/main-local.php')
);

(new yii\web\Application($config))->run();
