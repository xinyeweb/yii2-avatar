<?php


namespace xinyeweb\avatar;


use yii\web\AssetBundle;

class AvatarAsset extends AssetBundle
{
    public $css = [
        'css/cropper.min.css',
        'css/main.css',
        'css/site.css'
    ];

    public $js = [
        'js/cropper.min.js',
        'js/main.js',
        'js/site.js'
    ];

    public $depends = [
        'yii\web\YiiAsset',
    ];

    public function init() {
        $this->sourcePath = dirname(__FILE__) .DIRECTORY_SEPARATOR . 'assets';
        parent::init();
    }
}