<?php
if ($_SERVER["REQUEST_METHOD"] =="POST") {

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "user_management";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sname=$_POST['sname'];
    $saddress=$_POST['saddress'];
    $sphone=$_POST['sphone'];
    $sfaculty=$_POST['sfaculty'];
    $sgender=$_POST['sgender'];
    $id = $_POST['id'];

    // for image file
    $targetDirectory = "uploads/";
    $targetFile = $targetDirectory . basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile);
    // SQL statement to create table if not exists
   $sql="UPDATE students SET sname='$sname',saddress='$saddress',sphone='$sphone',sfaculty='$sfaculty',sgender='$sgender',sphoto='$targetFile' WHERE sid='$id'";
    
    if ($conn->query($sql) === TRUE) {
        header('location: edit.php');
    } else {
        echo "Error creating record: " . $conn->error;
    }
    
    $conn->close();
    
}
?>