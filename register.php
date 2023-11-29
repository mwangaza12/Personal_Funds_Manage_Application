<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>

    <div class="login-container">
        <h2>Register</h2>
        <form action="" method="post">
            
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>

                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>

                <label for="phone">Phone:</label>
                <input type="tel" id="phone" name="phone" pattern="[0-9]{10}" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>

            <input type="submit" name="submit" value="Register">
        </form>
        <p>Have an account? <a href="login.php" class="register-link">Login</a></p>

    </div>


<?php
require_once('dbconn.php');
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST["username"];
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT); // Hash the password for security

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Construct and execute SQL query
    $sql = "INSERT INTO users (username, name, phone, email, password) VALUES ('$username', '$name', '$phone', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
        header("Location: login.php");
        exit();

    } else {
        echo "Error: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
</body>
</html>