<?php
/**
 * Created by PhpStorm.
 * User: zolow
 * Date: 14.03.2018
 * Time: 2:07
 */

namespace app\assets;

use yii\web\AssetBundle;

class BlogAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/main.css',

    ];
    public $js = [
        'js/jquery.min.js',
        'js/skel.min.js',
        'js/util.js',
        'js/main.js',

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}