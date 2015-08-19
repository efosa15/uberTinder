<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
</head>

<body>

<div class="container">
<div>
How would you rank {name} as a driver?
</div>

<div>
<img src="http://smartquotefinder.com/wp-content/uploads/sites/2/2014/08/6C8012400-130624-teen-driver-3p.jpg"/>
</div>

<div>
<form action="rankCar.php" method="post">
  <input type="hidden" name="type" value="driver" />
  <input type="hidden" name="userId" value="123456" />
  <input type="submit" name="bad" alt="Bad" value="Bad"/>
  <input type="submit" name="good" alt="Good" value="Good"/>
</form>
</div>
</div>

</body>

</html>
