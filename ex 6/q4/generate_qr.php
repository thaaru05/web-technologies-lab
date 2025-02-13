<?php
// generate_qr.php

// URL for which QR code needs to be generated
$url = "https://github.com/thaaru05";  // Change this to your desired URL

// QuickChart API URL
$api_url = "https://quickchart.io/qr?text=" . urlencode($url);

// Display the QR code image
echo "<h3>QR Code for: $url</h3>";
echo "<img src='$api_url' alt='QR Code' />";
?>
