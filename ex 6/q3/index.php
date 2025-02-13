<?php
// Function to read JSON file
function readJSON($filename) {
    if (file_exists($filename)) {
        $json_data = file_get_contents($filename);
        return json_decode($json_data, true);
    }
    return null;
}

// Function to read XML file
function readXML($filename) {
    if (file_exists($filename)) {
        return simplexml_load_file($filename);
    }
    return null;
}

// Read data from JSON file
$jsonFile = "students.json";
$jsonData = readJSON($jsonFile);

// Read data from XML file
$xmlFile = "students.xml";
$xmlData = readXML($xmlFile);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display JSON & XML Data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 50%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid black;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>

    <h2>Student Data from JSON</h2>
    <?php if ($jsonData): ?>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Age</th>
            <th>Email</th>
        </tr>
        <?php foreach ($jsonData["students"] as $student): ?>
        <tr>
            <td><?php echo $student["id"]; ?></td>
            <td><?php echo $student["name"]; ?></td>
            <td><?php echo $student["age"]; ?></td>
            <td><?php echo $student["email"]; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <?php else: ?>
        <p style="color: red;">JSON file not found or invalid.</p>
    <?php endif; ?>


    <h2>Student Data from XML</h2>
    <?php if ($xmlData): ?>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Age</th>
            <th>Email</th>
        </tr>
        <?php foreach ($xmlData->student as $student): ?>
        <tr>
            <td><?php echo $student->id; ?></td>
            <td><?php echo $student->name; ?></td>
            <td><?php echo $student->age; ?></td>
            <td><?php echo $student->email; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <?php else: ?>
        <p style="color: red;">XML file not found or invalid.</p>
    <?php endif; ?>

</body>
</html>
