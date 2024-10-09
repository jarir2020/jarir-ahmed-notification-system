<?php

namespace JarirAhmed\NotificationSystem\assets;

use yii\web\AssetBundle;

class NotificationAsset extends AssetBundle
{
    // Use the correct alias for the directory where your assets are located
    public $sourcePath = '@vendor/jarir-ahmed/notification-system/src/assets';
    
    public $css = [
        'css/notification.css',
    ];
    public $js = [
        'js/notification.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}
