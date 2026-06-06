function showNotification(type, message) {
    // Create a notification div
    const notification = document.createElement('div');
    notification.className = 'notification ' + type; // Assign classes based on type
    notification.innerText = message; // innerText is XSS-safe (no HTML parsing)

    // Append notification to body
    document.body.appendChild(notification);

    // Remove the notification after 3 seconds
    setTimeout(() => {
        notification.remove();
    }, 3000);
}

// Render a batch of notifications. Accepts an array of { type, message } objects.
function showNotifications(notifications) {
    if (!Array.isArray(notifications)) {
        return;
    }
    notifications.forEach((n) => {
        if (n && typeof n === 'object') {
            showNotification(n.type || 'info', n.message != null ? n.message : '');
        }
    });
}
