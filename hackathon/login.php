<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .login-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="password"],
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .error-message {
            color: red;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<div class="header">
    <h1>Resource Allocation and Utilization Tracker (ADMIN VERSION)</h1>
</div>

<div class="login-container">
    <h2>Login</h2>

    <?php
    session_start();

    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Check if username and password are provided
        if (!empty($_POST['username']) && !empty($_POST['password'])) {
            // Validate username and password (you can replace this with your own validation method)
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Assuming username is "teamblackbox" and password is "password"
            if ($username === 'teamblackbox' && $password === 'password') {
                // Password is correct, redirect to another page
                $_SESSION['username'] = $username;
                header("Location: admininterface.php");
                exit;
            } else {
                // Incorrect username or password
                echo "<p class='error-message'>Incorrect username or password. Please try again.</p>";
            }
        } else {
            // Username or password is empty
            echo "<p class='error-message'>Please enter both username and password.</p>";
        }
    }
    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>
        <input type="submit" value="Login">
    </form>
</div>

</body>
</html>
