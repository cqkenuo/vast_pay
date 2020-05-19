<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\helper\Helper;
use common\models\User;
/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '基本信息'), 'url' => ['/user/base-info']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="user-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'username',
            'email:email',
            [
                'attribute'=>'money',
                'value' => function($data) {
                    return Helper::formatMoney($data->money);
                },
                'headerOptions' => ['width' => '80'],
            ],
            [
                'attribute'=>'status',
                'value' => function($data) {
                    return User::enumState('status', $data->status);
                },
                'headerOptions' => ['width' => '80'],
            ],
            [
                'attribute' => 'pre_login_at',
                'format' => ['date', 'php:Y-m-d H:i:s'],
            ],
            [
                'attribute' => 'created_at',
                'format' => ['date', 'php:Y-m-d H:i:s'],
            ],
            [
                'attribute' => 'updated_at',
                'format' => ['date', 'php:Y-m-d H:i:s'],
            ],
        ],
    ]) ?>

</div>
