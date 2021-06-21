<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Bosh sahifa';
?>
<div class="site-index">
    <div class="site-index">
        <h3><i class="fa fa-angle-right"></i> <?= Html::encode($this->title) ?></h3>
        <div class="row mt">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-md-4 col-sm-4 mb">
                        <div class="darkblue-panel pn">
                            <div class="darkblue-header">
                                <h5>Foydalanuvchilar</h5>
                            </div>
                            <h1 class="mt"><i class="fa fa-users fa-3x"></i></h1>
                            <footer>
                                <div class="centered">
                                    <h5><i class="fa fa-check fa-2x"></i> <?= \common\models\User::find()->count()?> ta</h5>
                                </div>
                            </footer>
                        </div>
                        <!--  /darkblue panel -->
                    </div>
                    <!-- /col-md-4 -->
                    <div class="col-md-4 col-sm-4 mb">
                        <div class="darkblue-panel pn">
                            <div class="darkblue-header">
                                <h5>Nomzodlar</h5>
                            </div>
                            <h1 class="mt"><i class="fa fa-list-alt fa-3x"></i></h1>
                            <footer>
                                <div class="centered">
                                    <h5><i class="fa fa-check fa-2x"></i> <?= \common\models\Nomzod::find()->where(['hired' => '1'])->count()?> ta</h5>
                                </div>
                            </footer>
                        </div>
                        <!--  /darkblue panel -->
                    </div>
                    <!-- /col-md-4 -->
                    <div class="col-md-4 col-sm-4 mb">
                        <div class="darkblue-panel pn">
                            <div class="darkblue-header">
                                <h5>Arizalar soni</h5>
                            </div>
                            <h1 class="mt"><i class="fa fa-envelope-o fa-3x"></i></h1>
                            <footer>
                                <div class="centered">
                                    <h5><i class="fa fa-check fa-2x"></i> <?= \common\models\Nomzod::find()->count()?> ta</h5>
                                </div>
                            </footer>
                        </div>
                        <!--  /darkblue panel -->
                    </div>
                    <!-- /col-md-4 -->
                </div>
                <!-- /row - SECOND ROW OF PANELS -->
                <!--  THIRD ROW OF PANELS -->
            </div>
        </div>
    </div>
</div>
