<?php

use common\models\User;
use vinacms\tools\ckeditor\CKEditor;
use vinacms\tools\elfinder\ElFinder;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use vinacms\admin\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput() ?>

    <?= $form->field($model, 'password_confirm')->passwordInput() ?>

    <?= $form->field($model, 'full_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'avatar')->fileInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'about_me')->widget(CKEditor::className(),[
        'editorOptions' => ElFinder::ckeditorOptions('elFinder', [
            'preset' => 'basic',
        ])
    ]) ?>

    <?= $form->field($model, 'roles')->dropDownList(User::roles()) ?>
    <?= $form->field($model, 'status')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-primary m-b-5' : 'btn btn-primary m-b-5']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
