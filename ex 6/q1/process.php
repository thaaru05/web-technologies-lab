<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $age = $_POST["age"];
    $email = $_POST["email"];
    $movie = $_POST["movie"];
    $quantity = $_POST["quantity"];
    $amount = $_POST["amount"];

    $errors = [];

    // Check if any field is empty
    if (empty($name) || empty($phone) || empty($age) || empty($email) || empty($movie) || empty($quantity) || empty($amount)) {
        $errors[] = "All fields are required.";
    }

    // Validate Name (Only alphabets allowed)
    if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
        $errors[] = "Name should contain only alphabets and spaces.";
    }

    // Validate Age (Only numbers allowed)
    if (!is_numeric($age)) {
        $errors[] = "Age must be a number.";
    }

    // Validate Phone (Only numbers, exactly 10 digits)
    if (!preg_match("/^[0-9]{10}$/", $phone)) {
        $errors[] = "Phone number must be exactly 10 digits.";
    }

    // Validate Email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    // Validate Quantity and Amount (Only numbers allowed)
    if (!is_numeric($quantity) || !is_numeric($amount)) {
        $errors[] = "Quantity and Ticket Amount must be numbers.";
    }

    // Display result
    if (empty($errors)) {
        echo "<h2 style='color:green;'>The tickets are successfully booked!</h2>";
    } else {
        echo "<h2 style='color:red;'>Error in booking!</h2>";
        foreach ($errors as $error) {
            echo "<p style='color:red;'>$error</p>";
        }
    }
}
?>
