<html>

<head>
<title>UberTinder</title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

  <meta name="viewport" content="width=device-width, inital-scale=1">

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

  <script src="http://maps.googleapis.com/maps/api/js"></script>

  <link rel="stylesheet" href="/styles/styles.css">


<!--  <script>
  function initialize() {
    var mapProp = {
      center:new google.maps.LatLng(51.6167,-3.9500),
      zoom:11,
      mapTypeId:google.maps.MapTypeId.ROADMAP,
      disableDefaultUI:true
    };
    var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

    var sMark = new google.maps.Marker({
      position:new google.maps.LatLng(51.618487, -3.945003),
    });

    var dMark = new google.maps.Marker({
      position: new google.maps.LatLng(51.669997, -3.945445),
    });

    //sMark.setMap(map);
  //  dMark.setMap(map);
  }
//  google.maps.event.addDomListener(window, 'load', initialize);
  </script>-->
</head>

<body>
  <div class="container">

    <div class="jumbotron">
      <div class="panel panel-default">
        <div class ="panel-body text-center">
          <div class="uberheader">
          <img src="/images/ubertinder-logo.png" height= width="85%">
          </div>

          <form action="" method="POST">
          <p>Going from: <input name="startLoc" type="textbox" placeholder="SA1 3QW" class="form-control"</p>
          <p>Going to: <input name="endLoc" type="textbox" placeholder="SA6 7JL" class="form-control" ></p>
          <input type="submit" height="160" width="160" name="good" alt="Good" value="Find My Ride"/>
          </form>
        </div>
      </div>

      <p><div id="googleMap" style="width:80%;height:50%; margin:0 auto"></div></p>

      <div class="panel panel-default">
        <div class="panel-body text-center">
          <a href="/driversAvailable" class="btn btn-primary" role="button" style="width:calc(50% - 10px)">Find a Driver</a>
          <a href="#" class="btn btn-primary" role="button" style="width:calc(50% - 10px)">Find Passengers</a>
        </div>
      </div>

    </div>

  </div>

  <script type="text/javascript">

    var directionsService = new google.maps.DirectionsService();
    var directionsDisplay = new google.maps.DirectionsRenderer();


    var map = new google.maps.Map(document.getElementById('googleMap'), {
      zoom:7,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    directionsDisplay.setMap(map);


    var request = {
      origin: '<?php  echo ($_POST["startLoc"]);?>',
      destination: '<?php echo ($_POST["endLoc"]);?>',
      travelMode: google.maps.DirectionsTravelMode.DRIVING
    };

      setMarkers(map);


function setMarkers(map) {

var users = [

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

    $sql = "SELECT UserId, UserName, Lat, Lng FROM Users WHERE Type = 'Driver'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          echo ("['" . $row["UserName"] ."'," . $row["Lat"] . ", " . $row["Lng"] . ", " . $row["UserId"] ."],");
          //['Clydach', 51.694293, -3.898795, 6],
          //$userId = $row["UserId"];
          //$name = $row["UserName"];
          //$photoUrl = $row["PhotoUrl"];
        }
    } else {
        echo "0 results";
    }
    $conn->close();
?>

['Dave',51.689365,-3.878138,2]
];

  // Marker sizes are expressed as a Size of X,Y where the origin of the image
  // (0,0) is located in the top left of the image.

  // Origins, anchor positions and coordinates of the marker increase in the X
  // direction to the right and in the Y direction down.
  var image = {
    url: 'images/user.png',
    // This marker is 20 pixels wide by 32 pixels high.
    size: new google.maps.Size(32, 32),
    // The origin for this image is (0, 0).
    origin: new google.maps.Point(0, 0),
    // The anchor for this image is the base of the flagpole at (0, 32).
    anchor: new google.maps.Point(0, 32)
  };
  // Shapes define the clickable region of the icon. The type defines an HTML
  // <area> element 'poly' which traces out a polygon as a series of X,Y points.
  // The final coordinate closes the poly by connecting to the first coordinate.
  var shape = {
    coords: [1, 1, 1, 20, 18, 20, 18, 1],
    type: 'poly'
  };

  var global_markers = [];

  for (var i = 0; i < users.length; i++) {
    var user = users[i];
    var marker = new google.maps.Marker({
      position: {lat: user[1], lng: user[2]},
      map: map,
      icon: image,
      shape: shape,
      title: user[0],
      //url: 'driverDetails.php?userId=' + user[3]
    });

    marker['url'] = 'driverDetails.php?userId=' + user[3];

    global_markers[i] = marker;

    google.maps.event.addListener(global_markers[i], 'click', function() {
         //window.location.href = 'this[driverDetails.php?userId=' + user[3];  //changed from markers[i] to this[i]
         window.location.href = this['url'];
       });

  }



}

    directionsService.route(request, function(response, status) {
      if (status == google.maps.DirectionsStatus.OK) {
        directionsDisplay.setDirections(response);
      }
    });

  </script>




</body>

</html>
