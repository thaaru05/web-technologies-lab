<?php
session_start();

// Check if user is already logged in via session
if (isset($_SESSION["student_name"])) {
    header("Location: dashboard.php");
    exit();
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_name = $_POST["student_name"];
    $roll_number = $_POST["roll_number"];
    $remember = isset($_POST["remember"]);

    // Validate input
    if (!empty($student_name) && !empty($roll_number)) {
        // Start Session
        $_SESSION["student_name"] = $student_name;
        $_SESSION["roll_number"] = $roll_number;

        // Set Cookies if Remember Me is checked
        if ($remember) {
            setcookie("student_name", $student_name, time() + (86400 * 30), "/"); // 30 days
            setcookie("roll_number", $roll_number, time() + (86400 * 30), "/");
        }

        // Redirect to Dashboard
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Both fields are required!";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Login</title>
</head>
<body>
    <h2>Student Login</h2>
    <?php if (isset($error)) { echo "<p style='color:red;'>$error</p>"; } ?>
    <form action="" method="post">
        <label for="student_name">Student Name:</label>
        <input type="text" name="student_name" value="<?php echo isset($_COOKIE["student_name"]) ? $_COOKIE["student_name"] : ""; ?>" required><br>

        <label for="roll_number">Roll Number:</label>
        <input type="text" name="roll_number" value="<?php echo isset($_COOKIE["roll_number"]) ? $_COOKIE["roll_number"] : ""; ?>" required><br>

        <input type="checkbox" name="remember"> Remember Me<br>

        <input type="submit" value="Login">
    </form>
</body>
</html>
