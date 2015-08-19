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
                <p>Search our drivers ...</p>
            </div>
        </div>
    </div>


    <div class="panel panel-default">
        <div class="panel-body text-center">



    <form name="form" method="post">

      Search by User Name: <input type="text" name="name"><input type="submit" name="button1" value="Search" /></br>
      Search by Passenger Rating: <input type="text" name="rating" /> <input type="submit" name="button2" value="Search" /></br>

    </form>


    <?php

        $username = "root";
        $password = "";
        $dbname = "uberTinder_DB";


    if(isset($_POST['button1'])){
          $name = $_POST['name'];

          $conn = new mysqli(null,
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

          $conn = new mysqli(null,
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
        </div>

</body>

</html>
