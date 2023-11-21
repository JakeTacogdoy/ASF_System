$(document).ready(function() {
    // Disable chat-related elements for non-user roles
    var userType = "<?php echo $_SESSION['usertype']; ?>";

    if (userType !== 'user') {
        $("#message_content").prop('disabled', true);
        $("#receiver_id").prop('disabled', true);
        $("#send_message").hide();
    }

    // ... (rest of your script)
});
