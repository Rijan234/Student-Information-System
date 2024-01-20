<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    // validate password
    if (strlen($password) < 8) {
        echo "Password must be at least 5 characters long.";
        exit ();
    }
    // validate username
    if (empty($username)) {
        echo "Name required";
        exit();
    }
    if (!preg_match("/^[a-zA-Z0-9 ]*$/", $username)) {
        $usernameErr = "Invalid username";
        exit();
    }
    // sanitize
    $sanitized_username = filter_var($username, FILTER_SANITIZE_STRING);
    $sanitized_password = password_hash($password, PASSWORD_DEFAULT);
    // establish connection with database 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "user_management";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql="UPDATE users SET username='$sanitized_usernamename',password='$sanitized_password' WHERE user_id='$id'";
    if ($conn->query($sql) === TRUE) {
        header('location: ..dashboard/index.html');
    } else {
        echo "Error changing  password: " . $conn->error;
    }
    
    $conn->close();

}
