<?php
// File to store counter
$counter_file = "counter.txt";

// Check if file exists
if (!file_exists($counter_file)) {
    file_put_contents($counter_file, "0"); // Create file with initial value 0
}

// Read the current count
$count = (int) file_get_contents($counter_file);

// Increment the count
$count++;

// Write the new count back to the file
file_put_contents($counter_file, $count);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visitor Counter</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 50px;
        }
        .counter {
            font-size: 24px;
            font-weight: bold;
            color: green;
            border: 2px solid #4CAF50;
            padding: 10px;
            display: inline-block;
            border-radius: 10px;
        }
    </style>
</head>
<body>

    <h2>Simple Visitor Counter</h2>
    <p class="counter">Total Visitors: <?php echo $count; ?></p>

</body>
</html>
