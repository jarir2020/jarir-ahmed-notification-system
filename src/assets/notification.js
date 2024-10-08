function showNotification(type, message) {
    // Create a notification div
    var notification = document.createElement('div');
    notification.className = 'notification ' + type; // Add type class
    notification.innerHTML = message;

    // Append notification to body
    document.body.appendChild(notification);

    // Display the notification
    $(notification).fadeIn();

    // Remove the notification after 3 seconds
    setTimeout(function () {
        $(notification).fadeOut(function () {
            this.remove(); // Remove the element from the DOM
        });
    }, 3000);
}
