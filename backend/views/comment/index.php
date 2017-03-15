<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\CommentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '评论管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comment-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('创建评论', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'id',
            [
                'attribute' => 'id',
                'contentOptions' => ['width' => '30px'],
            ],
            //'content:ntext',
            [
                'attribute' => 'content',
                'value' =>  'beginning',
//                'value' => function($model){
//                    $tmpStr = strip_tags($model->content);
//                    $tmpLen = mb_strlen($tmpStr);
//                    return mb_substr($tmpStr, 0, 20,'utf-8').(($tmpLen > 20)?'...':'');
//                }
            ],
            //'userid',
            [
                'attribute' => 'user.username',
                'value' => 'user.username',
                'label' => '作者',
            ],
            //'status',
            [
                'attribute' => 'status',
                'value' => 'status0.name',
                'filter' => \common\models\Commentstatus::find()
                    ->select(['name', 'id'])
                    ->orderBy('position')
                    ->indexBy('id')
                    ->column(),
                'contentOptions' => function($model){
                    return ($model->status == 1)?['class' => 'bg-danger', 'style' => 'width:110px']:['style' => 'width:110px'];
                },
            ],
            //'create_time:datetime',
            [
                'attribute' => 'create_time',
                'format' => ['date', 'php:Y-m-d H:i:s'],
            ],

            // 'email:email',
            // 'url:url',
            // 'post_id',
            'post.title',
            // 'remind',
            [
                'attribute' => 'remind',
                'filter' => [
                    0 => '未提醒',
                    1 => '已提醒',
                ],
                'value' => function($model){
                    return ($model->remind == 0) ? '未提醒' : '已提醒';
                },
                'contentOptions' => ['width' => '100px'],
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}{update}{approve}{delete}',
                'buttons' => [
                    'approve' => function($url, $model, $key) {
                        $options = [
                            'title' => Yii::t('yii', '审核'),
                            'aria-label' => Yii::t('yii', '审核'),
                            'date-confirm' => Yii::t('yii', '你确定通过这条评论吗？'),
                            'date-method' => 'post',
                            'data-pjax' => '0',
                        ];
                        return Html::a('<span class="glyphicon glyphicon-check"></span>', $url, $options);
                    }
                ],
            ],
        ],
    ]); ?>
</div>
