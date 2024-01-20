<?php

if($_SERVER['REQUEST_METHOD']=="POST"){
    // establishing connection with database
    $servername="localhost";
    $username="root";
    $password="";
    $dbname="user_management";

   // Database connection
        $db = new mysqli($servername, $username, $password, $dbname);

        // User login
        $enteredUsername = $_POST['username'];
        $enteredPassword =  $_POST['password'];

        // Retrieve the hashed password and username from the database
        $result = $db->query("SELECT username, password FROM users WHERE username = '$enteredUsername'");
        $row = $result->fetch_assoc();
        $storedUsername = $row['username'];
        $storedHashedPassword = $row['password'];

        // Verify the entered username and password using password_verify
        if ($storedUsername && $storedHashedPassword && password_verify($enteredPassword, $storedHashedPassword)) {
            // Username and password are correct
            header('location: dashboard/index.html');
        } 
       
        else {
            // Username or password is incorrect
           header('location: login_failed.php');
        }

$db->close();
}
?>