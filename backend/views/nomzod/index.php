<?php

use common\models\Nomzod;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\NomzodSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Nomzodlar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nomzod-index">
    <div class="row mt">
        <div class="col-sm-12">
            <section class="panel">
                <header class="panel-heading wht-bg">
                    <p>
                        <?= Html::a('<i class="fa fa-plus"></i>', ['create'], ['class' => 'btn btn-success','title'=> 'Yaratish']) ?>
                        <?= Html::a('<i class="fa fa-home"></i>', ['/'], ['class' => 'btn btn-default','title'=> 'Bosh sahifa']) ?>
                    </p>
                    <h4 class="gen-case">
                        <?= Html::encode($this->title) ?>
                    </h4>
                </header>

                <div class="panel-body minimal">
                    <?php Pjax::begin();?>
                    <?= GridView::widget([
                        'options' => ['class' => 'panel table-responsive'],
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                         'summary' => 'Namoyish etilayabdi <strong>{begin}-{end}</strong> ta yozuv <strong>{totalCount}</strong> tadan.',
                        'tableOptions' => [
                            'class' => 'table table-bordered table-condensed table-hover table-responsive',
                        ],
                        'rowOptions' => function($model)
                        {
                            if($model->status == 1)
                                return [
                                    'class' => 'danger'
                                ];
                            if($model->status == 2)
                                return [
                                    'class' => 'active'
                                ];
                            if($model->status == 3)
                                return [
                                    'class' => 'primary'
                                ];
                            if($model->status == 4)
                                return [
                                    'class' => 'success'
                                ];
                        },
                        'columns' => [

                            [
                                'class' => 'yii\grid\SerialColumn',
                                // # rishotka o'rniga tartib raqam qo'yildi
                                'header'=> 't\r',
                                // tepa qismi
                                'headerOptions' => ['class' => 'info text-center'],
                                // qidirishning chekkalariga ishlov berish
                                'filterOptions' => ['class' => 'success'],
                                // tartib raqamlar
                                'contentOptions' =>['class' => 'warning text-center'],
                                // Katakcha chizig'i
                                'options' => ['class' => 'table-bordered'],
                            ],
                            [
                                'attribute' => 'name',
                                'headerOptions' => ['class' => 'info'],
                                'filterOptions' => ['class' => 'success'],
                                'contentOptions' =>['class' => 'text-danger'],
                                'options' => ['class' => 'table-bordered'],
                                'format'=>'html',
                            ],

                            [
                                'attribute' => 'family_name',
                                'headerOptions' => ['class' => 'info'],
                                'filterOptions' => ['class' => 'success'],
                                'contentOptions' =>['class' => 'text-danger'],
                                'options' => ['class' => 'table-bordered'],
                                'format'=>'html',
                            ],
                            [
                                'attribute' => 'address',
                                'headerOptions' => ['class' => 'info'],
                                'filterOptions' => ['class' => 'success'],
                                'contentOptions' =>['class' => 'text-danger'],
                                'options' => ['class' => 'table-bordered'],
                                'format'=>'html',
                                'value'=> function ($model)
                                {
                                    return mb_substr($model->address,0,20).'...';
                                },
                            ],
                            [
                                'attribute' => 'country_of_origin',
                                'headerOptions' => ['class' => 'info'],
                                'filterOptions' => ['class' => 'success'],
                                'contentOptions' =>['class' => 'text-danger'],
                                'options' => ['class' => 'table-bordered'],
                                'format'=>'html',
                            ],
                            [
                                'attribute' => 'email_adress',
                                'headerOptions' => ['class' => 'info'],
                                'filterOptions' => ['class' => 'success'],
                                'contentOptions' =>['class' => 'text-danger'],
                                'options' => ['class' => 'table-bordered'],
                                'format'=>'email',
                            ],
                            [
                                'attribute' => 'phone_number',
                                'headerOptions' => ['class' => 'info'],
                                'filterOptions' => ['class' => 'success'],
                                'contentOptions' =>['class' => 'text-danger'],
                                'options' => ['class' => 'table-bordered'],
                                'format'=>'html',
                            ],
                            [
                                'attribute' => 'age',
                                'headerOptions' => ['class' => 'info text-center'],
                                'filterOptions' => ['class' => 'success text-center'],
                                'contentOptions' =>['class' => 'text-danger text-center'],
                                'options' => ['class' => 'table-bordered'],
                                'format'=>'html',
                            ],
                            [
                                'attribute' => 'hired',
                                'headerOptions' => ['class' => 'info text-center'],
                                'filterOptions' => ['class' => 'success text-center'],
                                'contentOptions' =>['class' => 'text-danger text-center'],
                                'options' => ['class' => 'table-bordered'],
                                'format'=>'html',
                                'filter'=>Nomzod::hired(),
                                'content' => function($data)
                                {
                                    return Html::a(($data->getHired($data->hired))?$data->getHired($data->hired) : $data->hired,
                                        ['hired','id' => $data->id],
                                        [
                                            'title' => 'Ishga olganmi yoqmi',
                                            'class' => 'btn btn-default',
                                        ]
                                    );
                                },

                            ],
                            [
                                'attribute' => 'status',
                                'headerOptions' => ['class' => 'info text-center','width' => '90'],
                                'filterOptions' => ['class' => 'success text-center','width' => '90'],
                                'format' => 'html',
                                'filter'=>Nomzod::status(),
                                'contentOptions' =>['class' => 'text-danger text-center','width' => '90'],
                                'content' => function($data)
                                {
                                    return Html::a(($data->getStatus($data->status))?$data->getStatus($data->status) : $data->status,
                                        ['activate','id' => $data->id],
                                        [
                                            'title' => 'Faollashtirish',
                                        ]
                                    );
                                },
                            ],
                            [
                                'attribute' => 'created_at',
                                'headerOptions' => ['class' => 'info text-center','width' => '80'],
                                'filterOptions' => ['class' => 'success text-center','width' => '80'],
                                'contentOptions' =>['class' => 'text-primary text-center','width' => '80'],
                                'options' => ['class' => 'table-bordered'],
                            ],

                            [
                                'attribute' => 'updated_at',
                                'headerOptions' => ['class' => 'info text-center','width' => '80'],
                                'filterOptions' => ['class' => 'success text-center','width' => '80'],
                                'contentOptions' =>['class' => 'text-success text-center','width' => '80'],
                                'options' => ['class' => 'table-bordered'],
                            ],

                            [
                                'class' => 'yii\grid\ActionColumn',
                                'options' => ['class' => 'table-bordered'],
                                'header'=> Html::a(Yii::t('yii','Menu')),

                                'headerOptions' => ['class' => 'info text-center','width' => '142'],
                                'filterOptions' => ['class' => 'success text-center','width' => '142'],
                                'contentOptions' =>['class' => 'text-center','width' => '142',],

                                'template' => '{view} {update} {delete} {activate}',
                                'buttons' => [
                                    'view' => function($url,$model)
                                    {
                                        return Html::a(
                                            '<i class="ace-icon fa fa-eye bigger-130"></i>',
                                            ['view','id' => $model->id],
                                            [
                                                'title'=> 'Ko\'rish',
                                                'class' => 'btn btn-info btn-xs'
                                            ]
                                        );
                                    },

                                    'update' => function($url,$model)
                                    {
                                        return Html::a(
                                            '<i class="ace-icon fa fa-pencil bigger-130"></i>',
                                            $url,
                                            [
                                                'title'=> 'Tahrirlash',
                                                'class' => 'btn btn-primary btn-xs'
                                            ]
                                        );
                                    },

                                    'delete' => function($url,$model)
                                    {
                                        return Html::a(
                                            '<i class="ace-icon fa fa-trash-o bigger-130"></i>',
                                            $url,
                                            [
                                                'title'=> 'O\'chirish',
                                                'data' =>
                                                    [
                                                        'confirm' => 'Siz rostdan ham ushbu elementni o\'chirmoqchimisiz ?',
                                                        'method'=>'post'
                                                    ],
                                                'class' => 'btn btn-danger btn-xs'
                                            ]
                                        );
                                    },

                                    'activate' => function($url,$model,$key)
                                    {
                                        return Html::a(
                                            '<i class="ace-icon fa fa-flag bigger-130"></i>',
                                            $url,
                                            [
                                                'title'=> 'Faollashtirish',
                                                'class' => 'btn btn-success btn-xs'
                                            ]
                                        );
                                    },

                                ],
                            ],
                        ],
                    ]); ?>
                    <?php Pjax::end();?>
                </div>
            </section>
        </div>
    </div>
</div>
