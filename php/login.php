<?php

session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = 'user_registration';


if (isset($_SESSION['error_message'])) {
    unset($_SESSION['error_message']);
}

$mysqli = new mysqli("localhost", $username, $password, $dbname);

$email = $mysqli->real_escape_string($_POST['email']);
$password = $mysqli->real_escape_string($_POST['password']);

$query = "SELECT * FROM users WHERE Email = '{$email}'";

if ($result = $mysqli->query($query)) {
    if ($row = $result->fetch_assoc()) {
      // var_dump($password);
      // var_dump($row["password"]);
        if ($password == $row["password"]) {
     
           header('Location: welcome-login.html');
            echo "Login successful!";
        }
        else {
            // Set a session variable to store the error message
            $_SESSION['error_message'] = 'Invalid email or password';
    
            // Redirect back to the login page
            header('Location: login.html');
            exit;
        } 
    } else {
        echo "Invalid username or Password";
    }
}

$mysqli->close();
?>
