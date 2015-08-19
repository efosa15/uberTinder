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

        <form name="form" action="userDetails.php" method="post">
          <input type="hidden" name="type" value="Driver" /></br>
          <table>
            <tr>
              <td>First Name </td>
              <td><input type="text" name="firstname"></td>
            </tr>
            <tr>
              <td>Surname </td>
              <td><input type="text" name="surname"></td>
            </tr>
            <tr>
              <td>Photo URL </td>
              <td><input type="text" name="photoURL"></td>
            </tr>
            <tr>
              <td>Email </td>
              <td><input type="text" name="email"></td>
            </tr>
            <tr>
              <td>Password </td>
              <td><input type="text" name="password"></td>
            </tr>
          </table>
          <input type="hidden" name="Sex" value="M" /></br>
          <input type="submit" name="submit" value="Login"/>
          <input type="submit" name="submit" value="Register" />
        </form>

      </div>
    </div>




</body>

</html>
