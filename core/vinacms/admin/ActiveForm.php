<?php

namespace vinacms\admin;

use yii\bootstrap\ActiveForm as BaseActiveForm;

class ActiveForm extends BaseActiveForm {
    public $fieldClass = 'vinacms\admin\ActiveField';
}