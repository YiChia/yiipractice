<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AccountInfo */
/* @var $form ActiveForm */
?>
<div class="AccountInfoForm">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'gender') ?>
        <?= $form->field($model, 'birthday') ?>
        <?= $form->field($model, 'memo') ?>
        <?= $form->field($model, 'account') ?>
        <?= $form->field($model, 'name') ?>
        <?= $form->field($model, 'email') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- AccountInfoForm -->
