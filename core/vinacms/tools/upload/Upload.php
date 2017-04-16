<?php

namespace vinacms\tools\upload;

use yii\web\UploadedFile;

class Upload {
    public static $file;
    public $uploadsAlias = '@uploads';

    public function __construct($file)
    {
        $this->file = $file;
    }

    public static function image($model, $field) {
        static::$file = UploadedFile::getInstance($model, $field);
        if(static::$file) {

        }
    }
}