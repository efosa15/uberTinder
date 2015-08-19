<html>

<head>

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

</head>

<body>

<div class="container">

  <div class="jumbotron">
  <h1><?php echo("uberTinder")?></h1>

    <h3><?php echo("Search our users ...")?></h3>


    <form name="form" method="post">

      Search by User Name: <input type="text" name="name"><input type="submit" name="button1" value="Search" /></br>
      Search by Passenger Rating: <input type="text" name="rating" /> <input type="submit" name="button2" value="Search" /></br>

    </form>


    <?php
        if(isset($_POST['button1'])){
          $name = $_POST['name'];

          $username = "db_user";
          $password = "Secret123";
          $dbname = "uberTinder_DB";

          $conn = new mysqli("173.194.224.107",
              $username, // username
              $password, // password
              $dbname,
              null,
              '/cloudsql/dvlahack:ubertinder'
          );

          $sql = "SELECT * FROM Users WHERE UserName LIKE '$name%'";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {

            echo "<table border='1'>
                    <tr>
                          <th>User Name</th>
                          <th>Driver Rating</th>
                          <th>Passenger Rating</th>
                          <th>No of Journeys</th>
                          <th>Photo</th>
                    </tr>";

            // output data of each row
            while($row = $result->fetch_assoc()) {
              echo "<tr>
                          <td>".$row["UserName"]."</td>
                          <td>".$row["DriverRating"]."</td>
                          <td>".$row["PassengerRating"]."</td>
                          <td>".$row["NoOfJourneys"]."</td>
                          <td><img src=".$row["PhotoUrl"]." width='150' height='150'></td></tr>";
            }
            echo "</table>";
          } else {
            echo "<h3>No records were found</h3>";
          }
          $conn->close();
        }//if isset

        if(isset($_POST['button2'])){
          $rating = $_POST['rating'];

          $username = "db_user";
          $password = "Secret123";
          $dbname = "uberTinder_DB";

          $conn = new mysqli("173.194.224.107",
              $username, // username
              $password, // password
              $dbname,
              null,
              '/cloudsql/dvlahack:ubertinder'
          );

          $sql = "SELECT * FROM Users WHERE PassengerRating >= $rating
                  ORDER BY PassengerRating DESC ";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {

            echo "<table border='1'>
                      <tr>
                            <th>User Name</th>
                            <th>Driver Rating</th>
                            <th>Passenger Rating</th>
                            <th>No of Journeys</th>
                            <th>Photo</th>
                      </tr>";

            // output data of each row
            while($row = $result->fetch_assoc()) {
              echo "<tr>
                            <td>".$row["UserName"]."</td>
                            <td>".$row["DriverRating"]."</td>
                            <td>".$row["PassengerRating"]."</td>
                            <td>".$row["NoOfJourneys"]."</td>
                            <td><img src=".$row["PhotoUrl"]." width='150' height='150'></td></tr>";
            }
            echo "</table>";
          } else {
            echo "<h3>No records were found</h3>";
          }
          $conn->close();
        }//if isset


    ?>


</div>

</body>

</html>
