<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "black_box";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to update all resources to available status
$sql = "UPDATE empty_table SET status = 'available', user_name=''";

if ($conn->query($sql) === TRUE) {
    echo "All resources updated to available status successfully";
} else {
    echo "Error updating resources: " . $conn->error;
}

// Close connection
$conn->close();
?>
