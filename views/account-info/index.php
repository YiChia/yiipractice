<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\AccountInfo;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $searchModel app\models\AccountInfoSearch */

$this->title = Yii::t('app', 'Account Infos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="account-info-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', '建立帳號'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'account',
            'name',
            [
                'attribute' => 'gender',
                'filter' => Html::activeDropDownList($searchModel, 'gender', \app\models\AccountInfo::getGenderStatusLabels(), ['class' => 'form-control', 'prompt' => '全部']),
                'value' => function (AccountInfo $model) {
                    return ArrayHelper::getValue(AccountInfo::getGenderStatusLabels(), $model->gender);
                },
                'contentOptions' => ['style' => 'width:130px;'],
            ],
            'email:email',
            [
                'attribute' => 'birthday',
                'value' => function (AccountInfo $model) {
                    return date('Y年m月d日', strtotime($model->birthday));
                },
                'contentOptions' => ['style' => 'width:130px;'],
            ],
            //'memo:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
