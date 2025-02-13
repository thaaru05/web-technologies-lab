<?php
$input_file = "input.txt";
$output_file = "output.txt";

// 1. Read from input file
if (file_exists($input_file)) {
    $content = file_get_contents($input_file);
    echo "<h3>Reading from input.txt:</h3>";
    echo "<pre>$content</pre>";
} else {
    echo "<p>Input file does not exist.</p>";
}

// 2. Write to output file (overwrite existing content)
$new_content = "This is the new content written to the output file.";
file_put_contents($output_file, $new_content);
echo "<h3>Writing to output.txt:</h3>";
echo "<pre>$new_content</pre>";

// 3. Append content to output file
$append_content = "\nThis line is appended to the output file.";
file_put_contents($output_file, $append_content, FILE_APPEND);
echo "<h3>Appending to output.txt:</h3>";
echo "<pre>$append_content</pre>";

// 4. Display final contents of output file
$final_content = file_get_contents($output_file);
echo "<h3>Final Content of output.txt:</h3>";
echo "<pre>$final_content</pre>";
?>
