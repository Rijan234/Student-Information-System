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
      border-radius: 5%;
    }
  </style>
</head>

<body>

  <div class="container-fluid p-2">


    <form action="../dashboard/index.html" method="">

      <input type="submit" class="btn btn-primary" value="Back">
    </form>
  </div>



  <!-- form -->
  <div class="main container mt-5 ">
    <main>
      <form action="../settings/chang.php" method="post" class=" rijan border bg-light border-5 w-50 p-4 mx-auto" enctype="multipart/form-data">

        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "user_management";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT username,password FROM users WHERE user_id=1";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {


            echo '<div class="col-12">';
            echo ' <label class="form-label">Username</label>';
            echo ' <input type="text" class="form-control " name="username" value="'.$row["username"].'">';
            echo '</div>';
            echo '<div class="col-12">';
            echo ' <label for="inputAddress2" class="form-label">Password </label>';
            echo ' <input type="text" class="form-control" name="password" value="'.$row["password"].'">';
            echo ' </div>';





            echo ' <div class="col-12 p-4"> ';
            echo ' <input type="submit" class="btn btn-primary" value="Change Password"> ';
            echo ' </div> ';
          }
        } else {
          echo "No students found.";
        }

        $conn->close();
        ?>
      </form>
    </main>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>