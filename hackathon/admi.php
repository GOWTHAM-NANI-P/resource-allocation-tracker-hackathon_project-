<?php

$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "black_box"; 

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$labname = $_POST['lab_name'];
$capacity = $_POST['capacity'];
$location = $_POST['location'];
$noon = $_POST['noon'];
$sql = "INSERT INTO black_box.empty_table(lab_name, capacity, location,noon) 
        VALUES ('$labname', '$capacity', '$location', '$noon')";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>