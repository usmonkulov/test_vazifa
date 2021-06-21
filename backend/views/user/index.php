<?php
use common\helpers\CssHelper;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Foydalanuvchilar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

  <div class="row mt">
    <div class="col-sm-12">
      <section class="panel">
        <header class="panel-heading wht-bg">
          <p>
            <?= Html::a('<i class="fa fa-plus"></i>', ['create'], ['class' => 'btn btn-success','title'=>Yii::t('yii','Create')]) ?>
            <?= Html::a('<i class="fa fa-home"></i>', ['/'], ['class' => 'btn btn-default','title'=>Yii::t('yii','Home')]) ?>
          </p>
          <h4 class="gen-case">
            <?= Html::encode($this->title) ?>
          </h4>
        </header>
        
        <div class="panel-body minimal">
            <?= GridView::widget([
                'options' => ['class' => 'panel table-responsive'],
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'tableOptions' => [
                  'class' => 'table table-bordered table-condensed table-hover table-responsive',
                ],
                'summary' => false,
                'rowOptions' => function($model)
                    {
                      if($model->status == 1)
                      return [
                        'class' => 'danger'
                      ];
                      if($model->status == 10)
                      return [
                        'class' => 'active'
                      ];
                    },
                'columns' => [
                    [
                        'class' => 'yii\grid\SerialColumn',
                        // # rishotka o'rniga tartib raqam qo'yildi
                        'header'=> Html::a(Yii::t('yii','t\r')), 
                        // tepa qismi
                        'headerOptions' => ['class' => 'info text-center'],
                        // qidirishning chikkalariga ishlov berish
                        'filterOptions' => ['class' => 'success'],
                        // tarrib raqamlar
                        'contentOptions' =>['class' => 'warning text-center'],
                        // Katakcha chizig'i
                        'options' => ['class' => 'table-bordered'],
                    ],
                    [
                        'attribute' => 'username',
                        'headerOptions' => ['class' => 'info'],
                        'filterOptions' => ['class' => 'success'],
                        'contentOptions' =>['class' => 'text-danger'],
                        // 'footerOptions' =>['class' => 'danger'],
                        'options' => ['class' => 'table-bordered'],
                        'format'=>'html',
                    ],
                    [
                      'attribute'=>'images',
                      'headerOptions' => ['class' => 'info text-center','width' => '60'],
                      'filterOptions' => ['class' => 'success text-center','width' => '60'],
                      'contentOptions' =>['class' => 'text-center','width' => '60'],
                      'options' => ['class' => 'table-bordered'],
                      'format'=>'raw', // raw, html
                        'content' => function($data)
                        {
                            if($file = $data->getImage()):
                                return (Html::a(Html::img($file->getUrl('60x60'),['style'=>'width:100%', 'alt' => $data->username]),$file->getUrl('300x300'),['rel' => 'galery', 'class' => 'photo']));
                            endif;
                        }
                    ],
                    [ 
                        'attribute' => 'email',
                        'headerOptions' => ['class' => 'info'],
                        'filterOptions' => ['class' => 'success'],
                        'contentOptions' =>['class' => 'text-danger'],
                        // 'footerOptions' =>['class' => 'danger'],
                        'options' => ['class' => 'table-bordered'],
                        'format'=>'html',
                    ],
                
                    [
                        'attribute'=>'status',
                        'headerOptions' => ['class' => 'info text-center'],
                        'filterOptions' => ['class' => 'success text-center'],
                        // 'contentOptions' =>['class' => 'text-danger'],
                        // 'footerOptions' =>['class' => 'danger'],
                        'options' => ['class' => 'table-bordered'],
                        'format'=>'html',
                        'filter' => $searchModel->statusList,
                        'value' => function ($data) {
                            return $data->getStatusName($data->status);
                        },
                        'contentOptions'=>function($model, $key, $index, $column) {
                            return ['class'=>'text-danger text-center',CssHelper::userStatusCss($model->status)];
                        }
                    ],
                    // role
                    [
                        'headerOptions' => ['class' => 'info text-center'],
                        'filterOptions' => ['class' => 'success text-center'],
                        // 'contentOptions' =>['class' => 'text-danger text-center'],
                        // 'footerOptions' =>['class' => 'danger'],
                        'options' => ['class' => 'table-bordered'],
                        'format'=>'html',
                        'attribute'=>'item_name',
                        'filter' => $searchModel->rolesList,
                        'value' => function ($data) {
                            return $data->roleName;
                        },
                        'contentOptions'=>function($model, $key, $index, $column) {
                            return ['class'=>'text-danger text-center',CssHelper::roleCss($model->roleName)];
                        }
                    ],
                    [ 
                      'attribute' => 'created_at',
                      'headerOptions' => ['class' => 'text-center info'],
                      'filterOptions' => ['class' => 'text-center success'],
                      'contentOptions' =>['class' => 'text-center text-danger'],
                      // 'footerOptions' =>['class' => 'danger'],
                      'options' => ['class' => 'table-bordered'],
                      'format'=>'date',
                    ],
                    [ 
                      'attribute' => 'updated_at',
                      'headerOptions' => ['class' => 'text-center info'],
                      'filterOptions' => ['class' => 'text-center success'],
                      'contentOptions' =>['class' => 'text-center text-danger'],
                      // 'footerOptions' =>['class' => 'danger'],
                      'options' => ['class' => 'table-bordered'],
                      'format'=>'date',
                    ],
                    // buttons
                    [
                'class' => 'yii\grid\ActionColumn',
                'options' => ['class' => 'table-bordered'],
                'header'=> Html::a(Yii::t('yii','Menu')), 

                'headerOptions' => ['class' => 'info text-center','width' => '111'],
                'filterOptions' => ['class' => 'success text-center','width' => '111'],
                'contentOptions' =>['class' => 'text-center','width' => '111'],

                'template' => '{view} {update} {featured} {delete} {activate}',
                'buttons' => [
                  'view' => function($url,$model)
                  {
                    return Html::a(
                      '<i class="ace-icon fa fa-user bigger-130"></i>',
                      ['view','id' => $model->id],
                      [
                        'title'=>Yii::t('yii','View'),
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
                        'title'=>Yii::t('yii','Update'),
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
                        'title'=>Yii::t('yii','Delete'),
                        'data' => 
                        [
                          'confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
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
                        'title'=>Yii::t('yii','Activate'),
                        'class' => 'btn btn-success btn-xs'
                      ]
                    );
                  },

                ],
              ],
            ],
          ]); ?>
        </div>
      </section>
    </div>
  </div>

</div>

