<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Information</title>
</head>
<body>
    <h3>Information</h3>
    <table border='1'>
        <tr>
            <th>Lab Name</th>
            <th>Remark</th>
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
        $sql = "SELECT lab_name, remark FROM empty_table";
        $result = $conn->query($sql);
        if ($result === false) {
            echo "Error: " . $conn->error;
        }
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>".$row["lab_name"]."</td>";
                echo "<td>".$row["remark"]."</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='2'>No remarks found</td></tr>";
        }
        $conn->close();
        ?>
    </table>
</body>
</html>
