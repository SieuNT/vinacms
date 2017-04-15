<?php

use vinacms\tools\ckeditor\CKEditor;
use vinacms\tools\elfinder\ElFinder;
use yii\helpers\Html;
use vinacms\admin\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'full_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'avatar')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'about_us')->widget(CKEditor::className(),[
        'editorOptions' => ElFinder::ckeditorOptions('elFinder', [
            'preset' => 'basic',
        ])
    ]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-primary m-b-5' : 'btn btn-primary m-b-5']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
