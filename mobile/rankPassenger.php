<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
</head>

<body>

<div class="container">
  <div class="row">
      <div class="col-centered">How would you rank {name} as a passenger?</div>
  </div>
      <div class="row">
        <div class="col-centered"><img src="http://yourbellalife.com/wp-content/uploads/2013/01/po9kjc0nsc5ge.jpeg"></div></div>

    <div class="row">
        <div class="col-centered">
      <form action="thanks.php" method="post">
        <input type="hidden" name="type" value="passenger" />
        <input type="hidden" name="userId" value="123456" />
        <input type="submit" name="bad" alt="Bad" value="Bad"/>
        <input type="submit" name="good" alt="Good" value="Good"/>
      </form></div>
    </div>

</div>

</body>

</html>
