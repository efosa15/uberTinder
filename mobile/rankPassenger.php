<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="/styles/styles.css">

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
    $conn->close();
?>
<div class="uberheader">
<img src="/images/ubertinder-logo.png" height="65" width="328">
</div>

</div>

</div>

<div class="container" id="rank">
  <div class="row">
      <div class="col-centered h4">How was <?php echo $name; ?> as a <b>passenger</b>?</div>
  </div>
      <div class="row">
        <div class="col-centered uberphotobox"><img src="<?php echo $photoUrl; ?>" class="uberphoto" width=250;height=250;></div></div>
    <div class="row">
        <div class="col-centered">
      <form action="thanks.php" method="post">
        <input type="hidden" name="type" value="Passenger" />
        <input type="hidden" name="userId" value="<?php echo $userId; ?>" />
        <input type="image" height="160" width="160" src="/images/thumbsdown-icon.png"  name="bad" alt="Bad" value="Bad"  style="margin-top:25px;"/>
        <input type="image" height="160" width="160" src="/images/thumbsup-icon.png" name="good" alt="Good" value="Good"/>
      </form></div>
    </div>

</div>

</body>

</html>
