<?php
$result = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num1 = $_POST["num1"];
    $num2 = $_POST["num2"];
    $operation = $_POST["operation"];

    // Validate input
    if (!is_numeric($num1) || !is_numeric($num2)) {
        $result = "Please enter valid numbers.";
    } else {
        switch ($operation) {
            case "add":
                $result = $num1 + $num2;
                break;
            case "subtract":
                $result = $num1 - $num2;
                break;
            case "multiply":
                $result = $num1 * $num2;
                break;
            case "divide":
                if ($num2 == 0) {
                    $result = "Cannot divide by zero!";
                } else {
                    $result = $num1 / $num2;
                }
                break;
            case "modulus":
                $result = $num1 % $num2;
                break;
            default:
                $result = "Invalid operation selected.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 50px;
        }
        form {
            width: 300px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input, select, button {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
        }
        .result {
            font-size: 18px;
            font-weight: bold;
            color: green;
            margin-top: 10px;
        }
    </style>
</head>
<body>

    <h2>Mathematical Calculator</h2>
    <form method="post">
        <label>Enter first number:</label>
        <input type="text" name="num1" required>
        
        <label>Enter second number:</label>
        <input type="text" name="num2" required>

        <label>Select Operation:</label>
        <select name="operation">
            <option value="add">Addition (+)</option>
            <option value="subtract">Subtraction (-)</option>
            <option value="multiply">Multiplication (*)</option>
            <option value="divide">Division (/)</option>
            <option value="modulus">Modulus (%)</option>
        </select>

        <button type="submit">Calculate</button>
    </form>

    <?php if ($result !== ""): ?>
        <p class="result">Result: <?php echo $result; ?></p>
    <?php endif; ?>

</body>
</html>
