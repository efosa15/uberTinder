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
        <p>Please login or register</p>
      </div>
    </div>

    <div class="panel panel-default">
      <div class="panel-body text-center">

        <?php

        $username = "root";
        $password = "";
        $dbname = "uberTinder_DB";

        $firstname = $_POST['firstname'];
        $surname = $_POST['surname'];
        $photoURL = $_POST['photoURL'];
        $email = $_POST['email'];
        $type = $_POST['type'];
        $password = $_POST['password'];
        $sex = $_POST['sex'];

        $conn = new mysqli(null,
            $username, // username
            $password, // password
            $dbname,
            null,
            '/cloudsql/dvlahack:ubertinder'
        );

          if ($_POST['submit'] == "Login") {

            $sql = "SELECT * FROM Users WHERE UserName LIKE $firstname AND Password LIKE $password";
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

          }
          elseif ($_POST['submit'] == "Register") {

            $sql = "INSERT INTO USERS (UserName, PhotoURL, Email, Password, Sex)
                    VALUES ($firstname, $photoURL, $email, $password, $sex)";

            echo "<table border='1'>
                    <tr>
                          <th>User Name</th>
                          <th>Photo</th>
                    </tr>";

            echo "<tr>
                          <td>$firstname</td>
                          <td><img src='$photoURL' width='150' height='150'></td></tr>";
            echo "</table>";

          }

        $conn->close();
        ?>


      </div>
    </div>


</body>

</html>
