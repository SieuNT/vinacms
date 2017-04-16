<?php

use yii\helpers\Html;
use vinacms\admin\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Users');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="panel-body user-index">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="panel-tools clearfix">
        <div class="pull-left">
            <?= Html::a(Yii::t('app', 'Create') . ' <i class="fa fa-plus"></i>', ['create'], ['class' => 'btn btn-purple w-xs']) ?>
        </div>
    </div>
    <hr class="hr-blank"/>
    <?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'full_name',
            'phone_number',
            'email:email',
            [
                'attribute' => 'status',
                'value' => function ($model) {
                    return $model->getStatusLabel();
                }
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete}',
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?></div>
