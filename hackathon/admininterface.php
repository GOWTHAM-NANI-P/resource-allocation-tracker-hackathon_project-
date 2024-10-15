<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resource Allocation and Utilization Tracker (ADMIN VERSION)</title>
    <style>
        body, html {
            height: 100%;
            margin: 0;
            padding: 0;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }
        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            padding: 20px;
            height: 100%;
        }
        .sub-container {
            flex-basis: calc(33.33% - 20px); /* Three containers per row with spacing */
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
            box-sizing: border-box;
        }
        .sub-container.booking {
            flex-basis: calc(66.66% - 20px); /* Two-thirds width for booking container */
        }
        .sub-container.disallocate {
            flex-basis: calc(33.33% - 20px); /* One-third width for disallocate container */
            text-align: right; /* Align to the right */
        }
        h1 {
            text-align: center;
            color: #333;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        form {
            margin-top: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
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
        
    </style>
</head>
<body>
    <h1>Resource Allocation and Utilization Tracker (ADMIN VERSION)</h1>
    <div class="container">
        <div class="sub-container">
            <h2>Enter THE DETAILS OF THE RESOURCE</h2>
            <form action="admi.php" method="post">
                <label for="lab_name">Lab Name:</label>
                <input type="text" id="lab_name" name="lab_name" required>
                
                <label for="capacity">Capacity:</label>
                <input type="text" id="capacity" name="capacity" required>
                
                <label for="location">Location:</label>
                <input type="text" id="location" name="location" required>
                
                <label for="noon">Noon:</label>
                <select name="noon" id="noon">
                    <option value="fornoon">fornoon</option>
                    <option value="afternoon">afternoon</option>
                </select>

                <label for="remark">Remark:</label>
                <input type="text" id="remark" name="remark">
                
                <input type="submit" value="Submit">
            </form>
        </div>

        <div class="sub-container booking">
            <h2>Booking Resources</h2>
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
        </div>

        <div class="sub-container disallocate">
            <h2>Disallocation of All Resources</h2>
            <h4>Click the button below to disallocate all resources</h4>
            <form action="disalloc.php" method="post">
                <input type="submit" value="Disallocate">
            </form>
        </div>

        <div class="sub-container">
            <h2>FETCH THE AVAILABLE RESOURCES</h2>
            <h4>Click the button to check the status of the resources</h4>
            <form action="fetcha.php" method="POST">
                <input type="submit" value="check the resources">
            </form>
        </div>

        <div class="sub-container">
            <h2>CLEARING THE DATA OF AVAILABLE RESOURCES</h2>
            <h4>Click the button below to clear all data of the resources</h4>
            <form action="clear_table.php" method="post">
                <input type="submit" value="Clear Table">
            </form>
        </div>
    </div>
</body>
</html>
