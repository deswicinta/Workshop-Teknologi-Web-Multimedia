<?php
session_start();
session_destroy();

// Unset cookies if they exist
if (isset($_COOKIE["user"]) && isset($_COOKIE["pass"])) {
    setcookie("user", '', time() - 3600);
    setcookie("pass", '', time() - 3600);
}

// Redirect to index.php
header('Location: index.php');
exit();
?>
