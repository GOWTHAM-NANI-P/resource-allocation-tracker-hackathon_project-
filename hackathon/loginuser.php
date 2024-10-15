<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .header {
            background-color: #007bff;
            color: white;
            padding: 20px;
            text-align: center;
        }

        .login-container {
            width: 300px;
            margin: 50px auto;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
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
            background-color: #007bff;
            color: white;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .error-message {
            color: red;
            margin-bottom: 10px;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="header">
    <h1>Resource Allocation and Utilization Tracker (USER VERSION)</h1>
</div>

<div class="login-container">
    <?php
    session_start();

 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      
        if (!empty($_POST['username']) && !empty($_POST['password'])) {
              $username = $_POST['username'];
            $password = $_POST['password'];

            
            if ($username === 'user' && $password === 'password') {
                
                $_SESSION['username'] = $username;
                header("Location: maininterface.php");
                exit;
            } else {
               
                echo "<p class='error-message'>Incorrect username or password. Please try again.</p>";
            }
        } else {
            
            echo "<p class='error-message'>Please enter both username and password.</p>";
        }
    }
    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <input type="submit" value="Login">
    </form>
</div>

</body>
</html>
