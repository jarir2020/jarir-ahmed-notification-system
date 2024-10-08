function showNotification(type, message) {
    const notification = document.createElement('div');
    notification.className = `notification ${type}`;
    notification.innerText = message;
    document.body.appendChild(notification);

    // Show the notification
    notification.style.display = 'block';

    // Remove the notification after 3 seconds
    setTimeout(() => {
        notification.style.display = 'none';
        document.body.removeChild(notification);
    }, 3000);
}

// Example usage
// showNotification('success', 'This is a success message.');
// showNotification('warning', 'This is a warning message.');
// showNotification('error', 'This is an error message.');
// showNotification('info', 'This is an informational message.');
