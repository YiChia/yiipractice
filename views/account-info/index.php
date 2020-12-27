<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\AccountInfo;
use yii\helpers\ArrayHelper;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $searchModel app\models\AccountInfoSearch */

$this->title = Yii::t('app', '帳號列表');
$this->params['breadcrumbs'][] = $this->title;

$getAccountUrl = \yii\helpers\Url::to(['account-info/get-gender']);

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

$('#w1 tbody tr').each(function(){
    var element = $(this);
    var gender = $(element).find('.gender').html();
    $.ajax({
        type : "GET",
        url  : "{$getAccountUrl}?gender="+gender,
        dataType: "json",
        success : function(data) {
            $(element).find('.gender').html(data.data);
                               
        },
        error : function (xhr, ajaxOptions, thrownError) {
            
        } 
    });
});


JSSS;
$this->registerJs($js);


$modal = <<<js

$('#updateModal').click(function(){
    $('#modal').modal('show');
    return false;
});
js;

$this->registerJs($modal);


?>
<div class="account-info-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

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
//                'filter' => Html::activeDropDownList($searchModel, 'gender', \app\models\AccountInfo::getGenderStatusLabels(), ['class' => 'form-control', 'prompt' => '全部']),
//                'value' => function (AccountInfo $model) {
//                    return ArrayHelper::getValue(AccountInfo::getGenderStatusLabels(), $model->gender);
//                },
                'contentOptions' => ['style' => 'width:130px;', 'class' => 'gender'],
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
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete}',
                'buttons' => [
                    'update' => function ($url, $model, $key) {
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>',
                            \yii\helpers\Url::to(['update', 'id' => $model->id]),
                            ['title' => "更新",]);
                    },
                    'delete' => function ($url, $model, $key) {
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', ['delete', 'id' => $model->id], [
                            'id' => "F1",
                        ]);
                    },
                    'show' => function ($url, $model, $key) {
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>',
                            '',
//                            \yii\helpers\Url::to(['update', 'id' => $model->id]),
                            ['title' => "modal", "id" => "updateModal"]);
                    },
                ],
            ],
        ],
    ]); ?>

</div>

<?php
    Modal::begin([
        'header' => '<h2>表單</h2>',
        'id' => 'modal',
        'size' => ' modal-lg',
    ]);
?>
    <div class="account-info-update">

        <h1><?= Html::encode($this->title) ?></h1>


    </div>
<?php
Modal::end();
?>
