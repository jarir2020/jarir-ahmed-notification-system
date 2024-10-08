namespace JarirAhmed\NotificationSystem\Components;


use Yii;

class NotificationHelper
{
    public static function show($message, $type = 'info')
    {
        $typeClass = [
            'success' => 'alert alert-success',
            'warning' => 'alert alert-warning',
            'error' => 'alert alert-danger',
            'info' => 'alert alert-info',
        ];

        $class = $typeClass[$type] ?? 'alert alert-info';

        Yii::$app->session->setFlash('notification', [
            'message' => $message,
            'class' => $class,
        ]);
    }
}
