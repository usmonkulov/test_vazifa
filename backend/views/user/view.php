<?php
use common\helpers\CssHelper;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii', 'Foydalanuvchilar'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <div class="post-view">
        <div class="row mt">
            <div class="col-sm-12">
                <section class="panel">    
                    <header class="panel-heading wht-bg">
                      <p>
                        <?= Html::a(
                          '<i class="fa fa-pencil"></i> '.Yii::t('yii','Tahrirlash'),
                          ['update', 'id' => $model->id], 
                          ['class' => 'btn btn-primary']) 
                        ?>

                        <?= Html::a(
                          '<i class="fa fa-share-square-o"></i> '.Yii::t('yii', 'Orqaga'),
                          ['index'], ['class' => 'btn btn-success']) 
                        ?>
                           
                        <?= Html::a(
                          '<i class="fa fa-trash-o"></i> '.Yii::t('yii', 'O\'chirish'),
                          ['delete', 'id' => $model->id], 
                          [
                            'class' => 'btn btn-danger',
                            'data' => [
                              'confirm' => Yii::t('yii', 'Siz rostdan ham ushbu elementni o\'chirmoqchimisiz?'),
                              'method' => 'post',
                            ],
                          ]
                        ) ?>
                      </p>
                      <h4 class="gen-case">
                        <?= Html::encode($this->title) ?>
                      </h4>
                    </header>

                    <div class="panel-body minimal">

                        <?= DetailView::widget([
                            'model' => $model,
                            'attributes' => [
                                'id',
                                'username',
                                'email:email',
                                //'password_hash',
                                [
                                    'label' => 'Rasm',
                                    'attribute'=>'images',
                                    'format'=>'raw', // raw, html
                                    'value' => function($data)
                                    {
                                        if($file = $data->getImage()):
                                            return (Html::a(Html::img($file->getUrl('150x150'),['style'=>'width:20%', 'alt' => $data->username]),$file->getUrl('400x400'),['class' => 'photo']));
                                        endif;
                                    }
                                ],
                                [
                                    'attribute'=>'status',
                                    'value' => '<span class="'.CssHelper::userStatusCss($model->status).'">
                                                    '.$model->getStatusName($model->status).'
                                                </span>',
                                    'format' => 'raw'
                                ],
                                [
                                    'attribute'=>'item_name',
                                    'value' => '<span class="'.CssHelper::roleCss($model->getRoleName()).'">
                                                    '.$model->getRoleName().'
                                                </span>',
                                    'format' => 'raw'
                                ],
                                //'auth_key',
                                //'password_reset_token',
                                //'account_activation_token',
                                'created_at:date',
                                'updated_at:date',
                            ],
                        ]) ?>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>