<?php

include './_init.php';

// Validate that the referer originates from the Golfdashboard URL
if (!isset($_SERVER['HTTP_REFERER']) || rtrim($_SERVER['HTTP_REFERER'], '/') !== rtrim($_SESSION['golfdashboardDomain'], '/')) {
    echo "Invalid referer";
    exit(0);
}

// Set the provided auth token
if (is_string($_POST['auth_token'])) {
    $_SESSION['authToken'] = $_POST['auth_token'] ?? null;
} else {
    unset($_SESSION['authToken']);
}

// Return HTML to close the window
?>
<!doctype html>
<html></html>
<body>
    <script>window.close('', '_parent', '')</script>
</body>
