<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\AccountInfo;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\AccountInfo */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '帳號資訊'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="account-info-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'account',
            'name',
            [
                'attribute' => 'gender',
                'value' => function (AccountInfo $model) {
                    return ArrayHelper::getValue(AccountInfo::getGenderStatusLabels(), $model->gender);
                },
                'contentOptions' => ['style' => 'width:130px;'],
            ],
            'email:email',
//            'birthday:date',
            [
                'attribute' => 'birthday',
                'value' => function (AccountInfo $model) {
                    return date('Y年m月d日', $model->birthday);
                },
                'contentOptions' => ['style' => 'width:130px;'],
            ],
            'memo:ntext',
        ],
    ]) ?>

</div>
