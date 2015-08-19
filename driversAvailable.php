<html>

<head>

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="/styles/styles.css">


</head>

<body>

<div class="container">

    <div class="jumbotron">
        <div class="panel panel-default">
            <div class ="panel-body text-center">
                <div class="uberheader">
                    <img src="/images/ubertinder-logo.png" height="65" width="328">
                </div>
                <p>Please select from the available drivers</p>
            </div>
        </div>


    <div class="panel panel-default">
        <div class="panel-body text-center">


        <?php

          $username = "root";
          $password = "";
          $dbname = "uberTinder_DB";

          $conn = new mysqli(null,
              $username, // username
              $password, // password
              $dbname,
              null,
              '/cloudsql/dvlahack:ubertinder'
          );

          $sql = "SELECT * FROM Users ORDER BY PassengerRating DESC LIMIT 3";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {

            echo "<form name='form' action='confirmation.php' method='post'>";



            echo "<table border='1' style='width:100%'>
                    <tr>
                          <th>Select</th>
                          <th>User Name</th>
                          <th>Driver Rating</th>
                          <th>Passenger Rating</th>
                          <th>No of Journeys</th>
                          <th>Photo</th>
                    </tr>";

            $counter = 1;
            // output data of each row
            while($row = $result->fetch_assoc()) {
              echo "<tr>

                          <td><input type='radio' name='driver' value='$counter'/></td>
                          <td>".$row["UserName"]."</td>
                          <td>".$row["DriverRating"]."</td>
                          <td>".$row["PassengerRating"]."</td>
                          <td>".$row["NoOfJourneys"]."</td>
                          <td><img src=".$row["PhotoUrl"]." width='150' height='150'></td></tr>";
                $counter++;
            }
            echo "</table>";
            echo "<input type='submit' name='confirm' value='Confirm'/>";

          } else {
            echo "<h3>No records were found</h3>";
          }
          $conn->close();
    ?>

    </div>
    </div>

</body>

</html>
