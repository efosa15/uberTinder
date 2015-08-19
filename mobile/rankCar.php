<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
</head>

<body>

<div class="container">

And how would you rank {name}'s' car?

<img src="http://infobomba.hu/kepek/ford_fiesta_2009_01.jpg" />

<form action="thanks.php" method="post">
  <input type="hidden" name="type" value="car" />
  <input type="hidden" name="userId" value="<?php echo $_POST["userId"]; ?>" />
  <input type="submit" name="bad" alt="Bad" value="Bad"/>
  <input type="submit" name="good" alt="Good" value="Good"/>
</form>

</div>

</body>

</html>
