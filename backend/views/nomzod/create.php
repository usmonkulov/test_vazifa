<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Nomzod */

$this->title = 'Nomzod yarating';
$this->params['breadcrumbs'][] = ['label' => 'Nomzodlar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nomzod-create">

    <div class="row mt">
        <div class="col-sm-12">
            <section class="panel">
                <div class="panel-body minimal">
                    <h4 class="mb"><i class="fa fa-angle-right"></i> <?= Html::encode($this->title) ?></h4>
                    <?= $this->render('_form', [
                        'model' => $model,
                    ]) ?>
                </div>
            </section>
        </div>
    </div>

</div>
