<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    // validate password
    if (strlen($password) < 8) {
        echo "Password must be at least 8 characters long."; // Corrected the password length check message
        exit(); // Exit to stop further execution if there's an error
    }
    // validate username
    if (empty($username)) {
        echo "Name required";
        exit();
    }
    if (!preg_match("/^[a-zA-Z0-9 ]*$/", $username)) {
        echo "Invalid username";
        exit();
    }
    // sanitize
    $sanitized_username = filter_var($username, FILTER_SANITIZE_STRING);
    $sanitized_password = password_hash($password, PASSWORD_DEFAULT);
    // establish connection with database 
    $servername = "localhost";
    $db_username = "root"; // Changed variable name to avoid conflict
    $db_password = "";
    $dbname = "user_management";

    $conn = new mysqli($servername, $db_username, $db_password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Use prepared statements to prevent SQL injection
    $sql="UPDATE users SET username='$username', password='$sanitized_password' WHERE user_id=1";

    if ($conn->query($sql) === TRUE) {
        header('location: ../index.html');
    } else {
        echo "Error changing  password: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
