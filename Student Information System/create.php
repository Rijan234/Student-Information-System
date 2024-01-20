<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rijan Rai Pvt.Ltd</title>
    <link rel="icon" href="/photos/logo.png" type="image/x-icon">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <?php
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $servername = "localhost";
        $username = "root";
        $password = "";

        $dbname=$_POST['dbname'];
    
        // Create connection
        $conn = new mysqli($servername, $username, $password);
    
        // Check connection
        if ($conn->connect_error) {
            echo '<p class="text-danger">Connection failed: ' . $conn->connect_error . '</p>';
        } else {
            // Create database named WebII
            $sql = "CREATE DATABASE $dbname";
            if ($conn->query($sql) === TRUE) {
                echo '<p class="text-success">Database  created successfully!</p>';
            } else {
                echo '<p class="text-danger">Error creating database: ' . $conn->error . '</p>';
            }
// to create tale
            $conn->select_db($dbname);
            $sql = "CREATE TABLE users (
                 user_id INT(4) PRIMARY KEY AUTO_INCREMENT ,
                 username VARCHAR(50) UNIQUE,
                 email VARCHAR(255) UNIQUE,
                 password VARCHAR(255) ,
                 created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
                 )";
            if($conn->query($sql)=== TRUE){
                echo '<p class="text-success">Table created successfully!</p>';
                echo '<script>window.location.href = "index.html";</script>';

            }
            else {
                echo '<p class="text-danger">Error creating table: ' . $conn->error . '</p>';
            }

    // to create student table
    $sql = "CREATE TABLE IF NOT EXISTS students (
        sid INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        sname VARCHAR(30) NOT NULL,
        saddress VARCHAR(50) NOT NULL,
        sphone VARCHAR(255) NOT NULL,
        sfaculty VARCHAR(255) NOT NULL,
        sgender VARCHAR(255) NOT NULL,
        sphoto VARCHAR(255) NOT NULL
    )";
    
    if ($conn->query($sql) === TRUE) {
        echo "Table created successfully or already exists.";
    } else {
        echo "Error creating table: " . $conn->error;
    }
    
            $conn->close();
        }
    }

    ?>


<div class="p-3 mb-2 bg-primary-subtle text-emphasis-primary background rijan">
    <form method="post" class="col-6 justify-content-center mx-auto" >
    
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Create Database</label>
        <input type="text" class="form-control"  placeholder="Enter your database name" name="dbname" >
    </div>

    <button type="submit" class="btn btn-primary">Create</button>
  
</form>
</div>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>