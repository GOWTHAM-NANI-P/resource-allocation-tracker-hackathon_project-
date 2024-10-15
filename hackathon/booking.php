<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "black_box"; 


$conn = new mysqli($servername, $username, $password, $database);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$resourceName = $_POST["resource_name"];
    $noon = $_POST["noon"];
    $user_na = $_POST["user_name"];
    $sql = "SELECT status FROM empty_table WHERE lab_name = '$resourceName'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // Fetch the status
        $row = $result->fetch_assoc();
        $status = $row["status"];
    
        // Check if the resource is already booked
        if ($status == 'unavailable') {
            echo "Resource already booked";
        } else {
            // If the resource is available, update its status
            $sql = "UPDATE empty_table SET status = 'unavailable', user_name = '$user_na' WHERE lab_name = '$resourceName' AND noon = '$noon'";
            
            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    } else {
        echo "Resource not found";
    }
    