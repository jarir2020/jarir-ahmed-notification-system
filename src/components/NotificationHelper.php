<?php

namespace JarirAhmed\NotificationSystem\Components;

/**
 * Yii integration helper. Stores a notification as a session flash.
 * Requires the Yii framework; throws a clear error when it is unavailable.
 */
class NotificationHelper
{
    public static function show($message, $type = 'info')
    {
        if (!class_exists('Yii') || !isset(\Yii::$app)) {
            throw new \RuntimeException(
                'NotificationHelper requires the Yii framework. Use ' .
                'JarirAhmed\\NotificationSystem\\Notification for framework-agnostic usage.'
            );
        }

        $typeClass = [
            'success' => 'alert alert-success',
            'warning' => 'alert alert-warning',
            'error' => 'alert alert-danger',
            'info' => 'alert alert-info',
        ];
        $class = $typeClass[$type] ?? 'alert alert-info';

        \Yii::$app->session->setFlash('notification', [
            'message' => $message,
            'class' => $class,
        ]);
    }
}
