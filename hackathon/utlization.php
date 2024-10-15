<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "root";
$password = "";
$database = "black_box";

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to find lab with maximum usage count
$max_sql = "SELECT lab_name, COUNT(*) as usage_count 
            FROM usage_tracker 
            GROUP BY lab_name 
            ORDER BY usage_count DESC 
            LIMIT 1";
$max_result = $conn->query($max_sql);
$max_lab = $max_result->fetch_assoc();

// Query to find lab with minimum usage count
$min_sql = "SELECT lab_name, COUNT(*) as usage_count 
            FROM usage_tracker 
            GROUP BY lab_name 
            ORDER BY usage_count ASC 
            LIMIT 1";
$min_result = $conn->query($min_sql);
$min_lab = $min_result->fetch_assoc();

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab Usage Tracker</title>
</head>
<body>
    <h3>Resource Usage Tracker</h3>
    <?php if ($max_lab): ?>
        <p>Maximum Utilization resource: <?php echo $max_lab["lab_name"]; ?> Usage Count: <?php echo $max_lab["usage_count"]; ?></p>
    <?php endif; ?>
    <?php if ($min_lab): ?>
        <p>Minimum Utilization resource: <?php echo $min_lab["lab_name"]; ?> Usage Count: <?php echo $min_lab["usage_count"]; ?></p>
    <?php endif; ?>
</body>
</html>

