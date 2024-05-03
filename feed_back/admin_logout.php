<?php
session_start();

// Unset all of the session variables
$_SESSION = array();

// Destroy the session cookie
if (ini_set('session.use_cookies', '0') !== FALSE) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params['path'], $params['domain'],
        $params['secure'], $params['httponly']);
}

// Destroy the session session data
session_destroy();

// Redirect to login page
header("location: admin_login.php");
exit();
?>