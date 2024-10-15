<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resource Allocation and Utilization Tracker</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            padding: 20px;
        }

        section {
            background-color: #f4f4f4;
            border-radius: 5px;
            margin: 10px;
            padding: 20px;
            width: 45%;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        table th, table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        table th {
            background-color: #f2f2f2;
        }

        form label {
            display: block;
            margin-bottom: 5px;
        }

        form input[type="text"], form input[type="date"], form select {
            margin-bottom: 10px;
            width: 100%;
        }

        form input[type="submit"] {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
        }

        select {
            color: black;
            padding: 10px; /* Adjust padding */
            margin-bottom: 20px; /* Move margin from input to select */
            border: 1px solid #ccc;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            box-sizing: border-box; /* Include padding in width calculation */
            transition: background-color 0.3s;
        }

        form input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <header>
        <h1>Resource Allocation and Utilization Tracker (USER VERSION)</h1>
    </header>
    <div class="container">
        <section id="resource-inventory">
            <h2>Resource Inventory</h2>
            <br>
            <h4>Click the button to check the status of the resources</h4>
            <form action="fetch.php" method="POST">
                <input type="submit" value="check the resources">
            </form>
        </section>
        <section id="booking-system">
            <h2>Booking System</h2>
            <form action="booking.php" method="post">
                <label for="resource">Select Resource:</label>
                <input type="text" name="resource_name">
                <br>
                <label for="">Select noon:</label>
                <select name="noon" id="noon">
                    <option value="fornoon">fornoon</option>
                    <option value="afternoon">afternoon</option>
                </select>
                <br>
                <label for="user">Enter Your Name:</label>
                <input type="text" name="user_name" id="user_name"><br>
                <input type="submit" value="Book Resource">
            </form>
        </section>
        <section id="utilization-reports">
            <h2>Utilization Reports</h2>
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
            <?php if ($max_lab): ?>
                <p>Maximum Utilization resource: <?php echo $max_lab["lab_name"]; ?> Usage Count: <?php echo $max_lab["usage_count"]; ?></p>
            <?php endif; ?>
            <?php if ($min_lab): ?>
                <p>Minimum Utilization resource: <?php echo $min_lab["lab_name"]; ?> Usage Count: <?php echo $min_lab["usage_count"]; ?></p>
            <?php endif; ?>
        </section>
        <section id="maintenance-scheduling">
            <h2>Maintenance</h2>
            <form action="remark.php" method="post">
                <h4>click the below button to check for remarks</h4>
                <input type="submit" value="check remarks">
            </form>
        </section>
    </div>
</body>
</html>
