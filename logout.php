<?php session_start(); ?>

<?php


// Destroy the session
session_destroy();

// Remove session data
unset($_SESSION['user_id']);

// Redirect to login page
header("Location: login.php");
exit;
?>