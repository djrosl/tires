<?php
/**
 * @copyright Copyright (C) 2016 Usha Singhai Neo Informatique Pvt. Ltd
 * @license https://www.gnu.org/licenses/gpl-3.0.html
 */
namespace frontend\assets;

use yii\web\AssetBundle;
/**
 * Application asset for the front end
 *
 * @package frontend\assets
 */
class AppAsset extends AssetBundle
{    
    public $basePath    = '@webroot/html';
    public $baseUrl     = '@web/html';
    
    public $css = [
        "libs/normalize-css/normalize.css",
				"libs/owl-carousel/assets/owl.carousel.min.css",
				"libs/jquery.mCustomScrollbar/jquery.mCustomScrollbar.min.css",
				"libs/select2/select2.min.css",
				"libs/fancybox/jquery.fancybox.min.css",
				"css/main.css",
    ];
    public $js = [
    	'https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.10.1/sweetalert2.all.min.js',
//        "libs/jquery_3.2.1/jquery.min.js",
				"libs/owl-carousel/owl.carousel.min.js",
				"libs/jquery.mCustomScrollbar/jquery.mCustomScrollbar.min.js",
				"libs/Simple-zoom/jquery.zoom.min.js",
				"libs/select2/select2.full.min.js",
				"libs/fancybox/jquery.fancybox.min.js",
				"js/scripts.js",
    ];

    public $depends = [
        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapPluginAsset',
//        'usni\fontawesome\FontAwesomeAsset'
    ];
}
