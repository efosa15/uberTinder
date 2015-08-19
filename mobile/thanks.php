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

<div class="container">

<img src="https://cdn0.iconfinder.com/data/icons/weboo-2/512/tick.png" />

  <?php



      echo("Type: " . $_POST['type'] . "<br>");
      echo("UserId: " . $_POST['userId'] . "<br>");

      if (isset($_POST['good'])) {
          # Publish-button was clicked
          echo("Good review" );
      }
      elseif (isset($_POST['bad'])) {
          # Save-button was clicked
          echo ("Bad Review");
      }
  ?>


</div>

</body>

</html>
