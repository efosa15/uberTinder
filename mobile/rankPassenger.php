<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
</head>

<body>
  <?php
  /*$username = "root";
  $password = "";
  $dbname = "uberTinder_DB";

  $conn = new mysqli(null,
    $username, // username
    $password, // password
    $dbname,
    null,
    '/cloudsql/dvlahack:ubertinder'
    );

    $sql = "SELECT * FROM Users WHERE UserId = " . $_GET['UserId'];
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          $userId = $row["UserId"];
          $name = $row["UserName"];
          $photoUrl = $row["PhotoUrl"];
        }
    } else {
        echo "0 results";
    }
    $conn->close(); */

    $userId = "123456";
    $name = "Joe Bloggs";
    $photoUrl = "https://avatars3.githubusercontent.com/u/2380536?v=3&s=460";


?>

<div class="container">
  <div class="row">
      <div class="col-centered">How would you rank <?php echo $name; ?> as a passenger?</div>
  </div>
      <div class="row">
        <div class="col-centered"><img src="<?php echo $photoUrl; ?>" width=250;height=250;></div></div>
    <div class="row">
        <div class="col-centered">
      <form action="thanks.php" method="post">
        <input type="hidden" name="type" value="passenger" />
        <input type="hidden" name="userId" value="<?php echo $userId; ?>" />
        <input type="submit" name="bad" alt="Bad" value="Bad"/>
        <input type="submit" name="good" alt="Good" value="Good"/>
      </form></div>
    </div>

</div>

</body>

</html>
