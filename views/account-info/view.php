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

$js = <<<JSSS
$("#F1").on('click', function (e) {
    if (confirm('請問你要刪除嗎？')) {
        if (confirm('請問你要刪除嗎？')) {
            $("#submitBtn").hide();
            return true;
        }
    }
    return false;
})
JSSS;
$this->registerJs($js);

?>
<div class="account-info-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', '修改'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', '刪除'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'id'=>'F1',
            'data' => [
                'confirm' => Yii::t('app', '請問你要刪除嗎?'),
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
                    return date('Y年m月d日', strtotime($model->birthday));
                },
                'contentOptions' => ['style' => 'width:130px;'],
            ],
            'memo:ntext',
        ],
    ]) ?>

</div>
