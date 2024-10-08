<?php

namespace JarirAhmed\NotificationSystem\assets;

use yii\web\AssetBundle;

class NotificationAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/notification.css', // Path to your CSS file for styling notifications
    ];
    public $js = [
        'js/notification.js', // Path to your JavaScript file for notification functionality
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}
