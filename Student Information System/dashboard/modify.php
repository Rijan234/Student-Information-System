<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Rijan Rai Pvt.Ltd</title>
  <link rel="icon" href="/photos/logo.png" type="image/x-icon">

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

  <div class="container-fluid">


    <form action="index.html" method="">
      <div class="p-2">

        <input type="submit" class="btn btn-primary" value="Back">
      </div>
    </form>
  </div>



  <!-- form -->
  <div class="main container mt-5 ">
    <main>
      <form action="update.php" method="post" class=" rijan border bg-light border-5 w-50 p-4 mx-auto" enctype="multipart/form-data">
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
          $id = $_POST['id'];

          // Database connection
          $servername = "localhost";
          $username = "root";
          $password = "";
          $dbname = "user_management";

          $conn = new mysqli($servername, $username, $password, $dbname);

          if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
          }

          // SQL query
          $sql = "SELECT sid,sname, saddress, sphone, sfaculty, sgender,sphoto FROM students WHERE sid='$id'";
          $result = $conn->query($sql);


          if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            echo '<div class="col-12">';
            echo '  <label class="form-label">Name</label>';
            echo '  <input type="text" class="form-control" name="sname" value="' . $row['sname'] . '" required>';
            echo '</div>';
            echo '<div class="col-12">';
            echo '  <label for="inputAddress2" class="form-label">Address</label>';
            echo '  <input type="text" class="form-control" name="saddress" value="' . $row['saddress'] . '" required>';
            echo '</div>';
            echo '<div class="col-md-12">';
            echo '  <label for="inputCity" class="form-label">Phone No</label>';
            echo '  <input type="text" class="form-control" name="sphone" value="' . $row['sphone'] . '" required>';
            echo '</div>';
            echo '<div class="col-md-12">';
            echo '  <label class="form-label">Faculty</label>';
            echo '  <select class="form-select" name="sfaculty" required>';
            echo '    <option selected>' . $row['sfaculty'] . '</option>';
            echo '    <option>BIT</option>';
            echo '    <option>Bsc.CSIT</option>';
            echo '  </select>';
            echo '  <label class="form-label">Gender</label>';
            echo '  <select class="form-select" name="sgender" required>';
            echo '    <option selected>' . $row['sgender'] . '</option>';
            echo '    <option>Male</option>';
            echo '    <option>Female</option>';
            echo '  </select>';
            echo '</div>';
            echo '<div class="mb-3">';
            echo '  <label for="formFile" class="form-label">Upload Student Photo</label>';
            echo '  <input class="form-control" type="file" name="image" value="'.$row['sphoto'].'" name="image" accept="image/png, image/gif, image/jpeg" required>';
            echo '</div>';
            



            //to pass id 
            // Hidden input field to store sid
            echo '<input type="hidden" name="id" value="' . $row['sid'] . '">';
            echo '<div class="mb-3">';
            echo '  <input type="submit" class="btn btn-primary" value="Update">';
            echo '</div>';
          }
        }
        ?>


      </form>
    </main>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>