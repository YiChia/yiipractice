<?php

use app\models\AccountInfo;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model \app\models\AccountInfoSearch */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="agent-search col-xs-12 padding-none">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>


    <div class="col-xs-3 padding-element">
        <?= $form->field($model, 'account')->label('帳號') ?>
    </div>

    <div class="col-xs-3 padding-element">
        <?= $form->field($model, 'name')->label('姓名') ?>
    </div>

    <div class="col-xs-3 padding-element">
        <?= Html::submitButton('查詢', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
