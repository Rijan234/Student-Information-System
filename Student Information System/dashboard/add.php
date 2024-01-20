<!-- <?php

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
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

      // SQL statement to create table if not exists
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
?> -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;


    }

    body {
      background-color: #E5EDF1;

    }

    .rijan {
      border: 4px solid rgba(8, 151, 199, 0.63);
      border-radius: 10%;
    }
  </style>
</head>

<body>

  <div class="container-fluid p-2">

    <!-- <p class="text-body-secondary">
      You need to create table only one time before recording any information.
    <form action="" method="post">

      <input type="submit" class="btn btn-primary" value="Click here to create">
    </form>
    </p> -->
    <form action="index.html" method="">

      <input type="submit" class="btn btn-primary" value="Back">
    </form>
  </div>



  <!-- form -->
  <div class="main container mt-5 ">
    <main>
      <form action="insert.php" method="post" class=" rijan border bg-light border-5 w-50 p-4 mx-auto" enctype="multipart/form-data">

        <div class="col-12">
          <label class="form-label">Name</label>
          <input type="text" class="form-control " name="sname" required>
        </div>
        <div class="col-12">
          <label for="inputAddress2" class="form-label">Address </label>
          <input type="text" class="form-control" name="saddress">
        </div>
        <div class="col-md-12">
          <label for="inputCity" class="form-label" >Phone No</label>
          <input type="text" class="form-control" name="sphone" required>
        </div>
        <div class="col-md-12">
          <label class="form-label">Faculty</label>
          <select class="form-select" name="sfaculty" required>
            <option selected>BIT</option>
            <option>Bsc.CSIT</option>
          </select>
          <label class="form-label">Gender</label>
          <select class="form-select" name="sgender">
            <option selected>Male</option>
            <option>Female</option>
          </select>
        </div>

        <div class="mb-3">
          <label for="formFile" class="form-label">Upload Student Photo</label>
          <input class="form-control" type="file" name="image" accept="image/png, image/gif, image/jpeg" required>
        </div>

        <div class="col-12">
          <input type="submit" class="btn btn-primary" value="Add">
        </div>
      </form>
    </main>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>