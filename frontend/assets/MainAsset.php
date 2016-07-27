<?php
namespace  frontend\assets;

use yii\web\AssetBundle;
use yii\web\View;

class MainAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
        'assets/style.css',
        'assets/owl-carousel/owl.carousel.css',
        'assets/owl-carousel/owl.theme.css',
        'assets/slitslider/css/style.css',
        'assets/slitslider/css/custom.css'

    ];

    public $js = [
        'assets/script.js',
        'assets/owl-carousel/owl.carousel.js',
        'assets/slitslider/js/modernizr.custom.79639.js',
        'assets/slitslider/js/jquery.ba-cond.min.js',
        'assets/slitslider/js/jquery.slitslider.js',
        'assets/js/google_analytics_auto.js'
    ];

    public $depends = [
        'yii\web\YiiAsset', // подключает yii.js, jquery.js
        'yii\bootstrap\BootstrapAsset', // подключает bootstrap.css
        'yii\bootstrap\BootstrapPluginAsset' // подключает bootstrap.js

    ];

    public $jsOptions = [
        'position' => View::POS_HEAD,
    ];
}