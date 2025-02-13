<?php
session_start();

// Check if session exists
if (!isset($_SESSION["student_name"])) {
    header("Location: index.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
</head>
<body>
    <h2>Welcome, <?php echo $_SESSION["student_name"]; ?>!</h2>
    <p>Your Roll Number: <?php echo $_SESSION["roll_number"]; ?></p>
    
    <a href="logout.php">Logout</a>
</body>
</html>
