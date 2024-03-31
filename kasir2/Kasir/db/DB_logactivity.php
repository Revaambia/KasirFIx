<?php

function log_activity($activity) {
    date_default_timezone_set('Asia/Bandung');
    $timestamp = date("Y-m-d H:i:s");
    $log_message = "$timestamp: $activity\n";
    file_put_contents("activity_log.txt", $log_message, FILE_APPEND);
}

// Contoh penggunaan:
log_activity("User logged in.");
log_activity("User Add Product");
log_activity("User Add User.");

?>