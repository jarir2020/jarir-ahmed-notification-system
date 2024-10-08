<?php

namespace JarirAhmed\NotificationSystem\assets;

use yii\web\AssetBundle;

class NotificationAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/notification.css', // Path to your CSS file
    ];
    public $js = [
        'js/notification.js', // Path to your JS file where showNotification is defined
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}
