<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\AccountInfo;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $model app\models\AccountInfo */
/* @var $form yii\widgets\ActiveForm */
$max = date('Y-m-d', time());

?>

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


