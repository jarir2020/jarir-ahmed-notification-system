<?php

namespace JarirAhmed\NotificationSystem\assets;

use yii\web\AssetBundle;

class NotificationAsset extends AssetBundle
{
    public $basePath = '@webroot/assets';
    public $baseUrl = '@web/assets';
    public $css = [
        'notification.css',
    ];
    public $js = [
        'notification.js',
    ];
}
