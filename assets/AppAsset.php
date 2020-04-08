<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/critical-style.css',
        'css/_fonts.css',
        'css/animate.css',
        'css/furniture-icons.min.css',
        'css/ion-range-slider.min.css',
        'css/linear-icons.min.css',
        'css/magnific-popup.min.css',
        'css/owl.carousel.min.css',
        'css/style.css',

    ];
    public $js = [
        //'js/scripts.min.js',
        'js/jquery.magnific-popup.min.js',
        'js/jquery.owl.carousel.min.js',
        'js/jquery.ion.rangeSlider.min.js',
        'js/jquery.isotope.pkgd.js',
        'js/main.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
