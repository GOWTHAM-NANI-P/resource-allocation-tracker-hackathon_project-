<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "black_box";
$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "DELETE FROM empty_table";
if ($conn->query($sql) === TRUE) 
{
    echo "Table data cleared successfully";
} else 
{
    echo "Error clearing table data: " . $conn->error;
}
$conn->close();
?>
