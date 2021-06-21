<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model common\models\Nomzod */

$this->title = $model->name.' '.$model->family_name;
$this->params['breadcrumbs'][] = ['label' => 'Nomzodlar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="nomzod-view">

    <div class="row mt">
        <div class="col-sm-12">
            <section class="panel">
                <header class="panel-heading wht-bg">
                    <p>
                        <?= Html::a('<i class="fa fa-home"></i> Bosh sahifa', ['/'], ['class' => 'btn btn-default','title'=> 'Bosh sahifa']) ?>

                        <?= Html::a(
                            '<i class="fa fa-pencil"></i> Tahrirlash',
                            ['update', 'id' => $model->id],
                            ['class' => 'btn btn-primary'])
                        ?>

                        <?= Html::a(
                            '<i class="fa fa-share-square-o"></i> Orqaga',
                            ['index'], ['class' => 'btn btn-success'])
                        ?>

                        <?= Html::a(
                            '<i class="fa fa-trash-o"></i> O\'chirish',
                            ['delete', 'id' => $model->id],
                            [
                                'class' => 'btn btn-danger',
                                'data' => [
                                    'confirm' => 'Siz rostdan ham ushbu elementni o\'chirmoqchimisiz ?',
                                    'method' => 'post',
                                ],
                            ]
                        ) ?>

                        <?= Html::a('<i class="fa fa-plus"></i> Yaratish', ['create'], ['class' => 'btn btn-info']) ?>
                    </p>
                    <h4 class="gen-case">
                        <?= Html::encode($this->title) ?>
                    </h4>
                </header>

                <div class="panel-body minimal">
                    <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        [
                            'attribute' => 'status',
                            'format' => 'html',
                            'value' => function($data)
                            {
                                return Html::a(($data->getStatus($data->status))?$data->getStatus($data->status) : $data->status,
                                    ['activ','id' => $data->id],
                                    [
                                        'title' => 'Faollashtirish',
                                        'class' => 'btn btn-default',
                                    ]
                                );
                            },
                        ],
                        [
                            'attribute' => 'hired',
                            'format' => 'html',
                            'value' => function($model)
                            {
                                return Html::a(($model->getHired($model->hired))?$model->getHired($model->hired) : $model->hired,
                                    ['hireda','id' => $model->id],
                                    [
                                        'title' => 'Ishga olganmi yoqmi',
                                        'class' => 'btn btn-default',
                                    ]
                                );
                            },
                        ],
                        'id',
                        'name',
                        'family_name',
                        'address:html',
                        'country_of_origin',
                        'email_adress:email',
                        'phone_number',
                        'age',
                        'created_at',
                        'updated_at',
                    ],
                ]) ?>

                </div>
            </section>
        </div>
    </div>
</div>

