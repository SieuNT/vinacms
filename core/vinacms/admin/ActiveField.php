<?php

namespace vinacms\admin;

use yii\bootstrap\ActiveField as BaseActiveField;

class ActiveField extends BaseActiveField {
    public $checkboxTemplate = "<div class=\"checkbox\">\n{beginLabel}\n{input}\n{labelTitle}\n{endLabel}\n{error}\n{hint}\n</div>";
}