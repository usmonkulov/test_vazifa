<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'form/upload.css',
        'form/bookproduct.css',
        'form/uploadlogo.css',
        'form/upload-publicity-image-label.css',
        // 'lib/bootstrap/css/bootstrap.min.css',
        'lib/font-awesome/css/font-awesome.css',
        'css/zabuto_calendar.css',
        'lib/gritter/css/jquery.gritter.css',
        'css/style.css',
        'css/style-responsive.css',

        'form/upload-users.css',
        'form/upload-publicity.css',

        'css/jquery.fancybox.css'
    ];
    public $js = [
        'form/upload.js',
        'form/bookproduct.js',
        'form/uploadlogo.js',
        'form/upload-publicity-image-label.js',
        'lib/chart-master/Chart.js',
        // 'lib/jquery/jquery.min.js',
        // 'lib/bootstrap/js/bootstrap.min.js',
        'lib/jquery.dcjqaccordion.2.7.js',
        'lib/jquery.scrollTo.min.js',
        'lib/jquery.nicescroll.js',
        'lib/jquery.sparkline.js',
        'lib/common-scripts.js',
        'lib/gritter/js/jquery.gritter.js',
        'lib/gritter-conf.js',
        'lib/sparkline-chart.js',
        'lib/zabuto_calendar.js',
        'js/main.js',

        'js/jquery.fancybox.pack.js',
        'js/functions.js',
        'js/adminJS.js',

        'form/upload-users.js',
        'form/upload-publicity.js'        
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
