<?php
if($_SERVER['REQUEST_METHOD']=="POST"){
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];

    // validate username
    if(empty($username)){
        header('location: name_required.php');
        exit();
    }
    if(!preg_match("/^[a-zA-Z0-9 ]*$/",$username) ){
        header('location: username_failed.php');
        exit();
    }

    // validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header('location: email_failed.php');
        exit();
       } 

    //validate password
    if (strlen($password) < 8) {
       header('location: password_failed.php');
       exit();
    }
    // sanitize
    $sanitized_username = filter_var($username, FILTER_SANITIZE_STRING);
    $sanitized_email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $sanitized_password = password_hash($password, PASSWORD_DEFAULT);

    // establishing connection with database
    $servername="localhost";
    $username="root";
    $password="";
    $dbname="user_management";

    $conn= new mysqli($servername,$username,$password,$dbname);

    if($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);

    }
    // checking if username already exists
            
        // Function to check if a username already exists
        function isUsernameExists($username, $conn) {
            $query = "SELECT * FROM users WHERE username = '$username'";
            $result = mysqli_query($conn, $query);

            return mysqli_num_rows($result) > 0;
        }

        // sanitized lai real variable ma lageko
        $username = $sanitized_username;
        $email= $sanitized_email;
        $password=$sanitized_password;
        // return true if exists 
        // checking if email already exists
        function isEmailExists($email, $conn){
            $query = "SELECT * FROM users WHERE email= '$email'";
            $result = mysqli_query($conn,$query);
            return mysqli_num_rows($result)> 0;
        }
        // calling functions
        if (isUsernameExists($username, $conn)) {
            header('location: username_exists.php');
            exit();
        }
        
        elseif(isEmailExists($email, $conn)){
            header('location: email_exists.php');
            exit();
        }
        else{
            
        $sql = "INSERT INTO users (username, email, password)
        VALUES ('$username', '$email', '$password')";
        if ($conn->query($sql) === TRUE) {
            echo '<p class="text-success">Table created successfully!</p>';
            echo '<script>window.location.href = "index.html";</script>';
        }
        }

}
?>