"# jarir-ahmed-notification-system" 

Install: composer require jarir-ahmed/notification-system

Example Useage:

<?php
use JarirAhmed\NotificationSystem\assets\NotificationAsset;

// Register the Notification asset
NotificationAsset::register($this);

$successNotification = (object)[
    'type' => 'success',
    'message' => 'This is a success notification.'
];

$warningNotification = (object)[
    'type' => 'warning',
    'message' => 'This is a warning notification.'
];

$errorNotification = (object)[
    'type' => 'error',
    'message' => 'This is an error notification.'
];

$infoNotification = (object)[
    'type' => 'info',
    'message' => 'This is an info notification.'
];

// Create an array of notifications and encode it to JSON
$notifications = json_encode([$successNotification, $warningNotification, $errorNotification, $infoNotification]);

// Register JavaScript to show notifications
$this->registerJs(<<<JS
    function showNotification(type, message) {
        const notification = document.createElement('div');
        notification.className = 'notification ' + type;
        notification.innerText = message;

        document.body.appendChild(notification);

        setTimeout(() => {
            notification.remove();
        }, 3000);
    }

    // Show all notifications
    const notifications = {$notifications};
    notifications.forEach(notification => {
        showNotification(notification.type, notification.message);
    });
JS
);
?>

<style>
.notification {
    position: fixed;
    bottom: 20px;
    left: 20px;
    padding: 10px;
    border-radius: 5px;
    color: white;
    z-index: 1000;
    transition: opacity 0.5s ease;
}

.success {
    background-color: green;
}

.warning {
    background-color: yellow;
    color: black; /* Change text color for visibility */
}

.error {
    background-color: red;
}

.info {
    background-color: blue;
}
</style>
