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

        .table-caption {
            text-align: center;
            caption-side: top;
        }
    </style>
</head>

<body>
    <form action="index.html" method="post">
        <div class="p-2">

            <input type="submit" class="btn btn-primary " value="Dashboard">
        </div>
    </form>
    <div class="container-fluid p-4">
        <table class="table table-striped">
            <caption class="fs-4 text-center text-uppercase text-muted mb-3 table-caption">Student Information</caption>
            <thead>
                <tr>
                    <th scope="col">S.N</th>
                    <th scope="col" class="col-1 col-md-1">Photo</th>

                    <th scope="col">Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Faculty</th>
                    <th scope="col">Gender</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "user_management";

                $conn = new mysqli($servername, $username, $password, $dbname);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT *, @sn := @sn + 1 AS serial_number FROM students, (SELECT @sn := 0) AS sn";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {

                        echo '<tr >';

                        echo '<td scope="row  class="col-1" style="width: 3%;">' . $row["serial_number"] . '</td>';
                        echo '<td scope="row">' . " <img src='" . $row["sphoto"] . "' width='130' height='100'>" . '</td>';
                        echo '<td scope="row">' . $row["sname"] . '</td>';
                        echo '<td scope="row">' . $row["saddress"] . '</td>';
                        echo '<td scope="row">' . $row["sphone"] . '</td>';
                        echo  '<td scope="row">' . $row["sfaculty"] . '</td>';
                        echo '<td scope="row">' . $row["sgender"] . '</td>';
                        echo '</tr>';
                    }
                } else {
                    echo "No students found.";
                }

                $conn->close();


                ?>

            </tbody>
        </table>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>