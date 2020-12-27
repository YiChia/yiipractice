<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AccountInfo */

$this->title = Yii::t('app', '新增帳戶');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '帳戶資訊'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="account-info-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
