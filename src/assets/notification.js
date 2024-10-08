
function showNotification(type, message) {
    // Create a notification div
    const notification = document.createElement('div');
    notification.className = 'notification ' + type; // Assign classes based on type
    notification.innerText = message; // Set the message

    // Append notification to body
    document.body.appendChild(notification);

    // Remove the notification after 3 seconds
    setTimeout(() => {
        notification.remove();
    }, 3000);
}
