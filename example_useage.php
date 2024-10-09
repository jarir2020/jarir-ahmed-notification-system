<?php
use JarirAhmed\NotificationSystem\assets\NotificationAsset;

// Register the Notification asset
NotificationAsset::register($this);

// Encode notifications as JSON
$notifications = json_encode([
    (object)['type' => 'success', 'message' => 'This is a success notification.'],
    (object)['type' => 'warning', 'message' => 'This is a warning notification.'],
    (object)['type' => 'error', 'message' => 'This is an error notification.'],
    (object)['type' => 'info', 'message' => 'This is an info notification.'],
]);

// Register JS to trigger notifications using the included script
$this->registerJs(<<<JS
    const notifications = $notifications;
    showNotifications(notifications);
JS
);
