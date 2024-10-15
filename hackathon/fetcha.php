<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Information</title>
</head>
<body>
    <h3>Information</h3>
    <table border='1'>
        <tr>
            <th>lab_name</th>
            <th>capacity</th>
            <th>location</th>
            <th>noon</th>
            <th>status</th>
            <th>remark</th>
            <th>bookers</th>
        </tr>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "black_box";
        $conn = new mysqli($servername, $username, $password, $database);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT * FROM empty_table";
        $result = $conn->query($sql);
        if ($result === false) {
            echo "Error: " . $conn->error;
        }
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>".$row["lab_name"]."</td>";
                echo "<td>".$row["capacity"]."</td>";
                echo "<td>".$row["location"]."</td>";
                echo "<td>".$row["noon"]."</td>";
                echo "<td>".$row["status"]."</td>";
                echo "<td>".$row["remark"]."</td>";
                echo "<td>".$row["user_name"]."</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No records found</td></tr>";
        }
        error_reporting(E_ALL);
ini_set('display_errors', 1);
        $conn->close();
        ?>
    </table>
</body>
</html>
