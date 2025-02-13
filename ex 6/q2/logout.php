<?php
session_start();
session_destroy(); // Destroy session

// Clear Cookies
setcookie("student_name", "", time() - 3600, "/");
setcookie("roll_number", "", time() - 3600, "/");

// Redirect to Login Page
header("Location: index.php");
exit();
?>
