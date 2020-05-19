<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = Yii::t('app', '修改登录密码: {name}', [
    'name' => $model->username,
]);
$this->params['breadcrumbs'][] = Yii::t('app', '商户信息');
$this->params['breadcrumbs'][] = Yii::t('app', '修改登录密码');
?>
<div class="user-update">

    <h1><?= Html::encode($this->title) ?></h1>
    <? if( $successHint === false ):?>

        <div class="save-login-passwrd-form">
            <?php $form = ActiveForm::begin(); ?>
            <?php echo $form->errorSummary($formValidate); ?>

            <?= $form->field($formValidate, 'password')->passwordInput() ?>

            <?= $form->field($formValidate, 'confirm_password')->passwordInput() ?>


            <div class="form-group">
                <?= Html::submitButton(Yii::t('app', '保存'), ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    <? else: ?>
        <div class="jumbotron" style="background: #f5f5f5">
            <h2 style="color: #0f7b9f"><?= $successHint; ?></h2>
            <p>
            <div class=" text-center" >
                <?=Html::beginForm(['/site/logout'], 'post');?>
                <?=Html::submitButton('注销，重新登录',
                ['class' => 'btn btn-lg btn-primary',
                    'style'=> 'font-size: 16px']
                );?>
                <?=Html::endForm();?>
            </div>
            </p>
        </div>
    <? endif; ?>
</div>
