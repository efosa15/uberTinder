<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

</head>

<body>

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

    //Update number of Journeys
    $sql = "UPDATE Users SET NoOfJourneys = NoOfJourneys + 1 WHERE UserId = " . $_POST['userId'];
    $result = $conn->query($sql);

    if ($_POST['type'] = "Passenger") {

            if (isset($_POST['good'])) {
                //Good review
                $sql = "UPDATE Users SET PassengerRating = PassengerRating + 1 WHERE UserId = " . $_POST['userId'];
                $result = $conn->query($sql);

            }
            elseif (isset($_POST['bad'])) {
              //Bad review
              $sql = "UPDATE Users SET PassengerRating = PassengerRating - 1 WHERE UserId = " . $_POST['userId'];
              $result = $conn->query($sql);
          }

    }
    elseif ($_POST['type'] = "Driver") {
      # code...
    }



$conn->close();

  ?>


<div class="container">

<h1>Thanks for your feedback!</h1>

</div>

</body>

</html>
