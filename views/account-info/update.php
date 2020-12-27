<?php

use yii\helpers\Html;
use yii\bootstrap\Modal;
use yii\widgets\ActiveForm;
use app\models\AccountInfo;

/* @var $this yii\web\View */
/* @var $model app\models\AccountInfo */

$this->title = Yii::t('app', '更新 帳戶: {name}', [
    'name' => $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '帳戶資訊'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');

$max = date('Y-m-d');

$modal = <<<js
    $('#modal').modal('show');
js;

$this->registerJs($modal);


?>
<div class="account-info-update">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php
    Modal::begin([
        'header' => '<h2>帳號</h2>',
        'id' => 'modal',
        'size' => ' modal-lg',
    ])?>

    <div class="account-info-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'account')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gender')->dropDownList(AccountInfo::getGenderStatusLabels()) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'birthday')->input('date', [
        'class'            => 'form-control date',
        'data-date-format' => 'YYYY-MM-DD',
        'max'              => $max,
    ]) ?>

    <?= $form->field($model, 'memo')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

    <?php Modal::end()?>
</div>
