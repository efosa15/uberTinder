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
        <div class="panel panel-default">
            <div class ="panel-body text-center">
                <div class="uberheader">
                    <img src="/images/ubertinder-logo.png" height="65" width="328">
                </div>
                <p>Driver Details</p>
            </div>
        </div>


    <div class="panel panel-default">
        <div class="panel-body text-center">


            <?php

            if (isset($_GET['userId'])) {

                $userId = $_GET['userId'];

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

                $sql = "SELECT * FROM Users WHERE UserId = $userId";
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
                    echo "<h3>No records were found for User ID: $userId</h3>";
                }
                $conn->close();


                 }else{

                     echo "No driver details found";
                        // Fallback behaviour goes here
                    }
            ?>

            </div>
        </div>



</body>

</html>
