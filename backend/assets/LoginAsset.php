<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class LoginAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        // 'lib/bootstrap/css/bootstrap.min.css',
        'lib/font-awesome/css/font-awesome.css',
        'css/style.css',
        'css/style-responsive.css',
        'css/blue.css',
    ];
    public $js = [
        // 'lib/jquery/jquery.min.js',
        // 'lib/bootstrap/js/bootstrap.min.js',
         'lib/jquery.backstretch.min.js',
         'js/icheck.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
