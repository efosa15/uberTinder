<html>

<head>

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

  <meta name="viewport" content="width=device-width, inital-scale=1">

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

  <script src="http://maps.googleapis.com/maps/api/js"></script>
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
          <h1><?php echo("uberTinder")?></h1>
          <p>Going from: <input id="startLoc" type="textbox" placeholder="SA1 3QW" class="form-control"</p>
          <p>Going to: <input id="startLoc" type="textbox" placeholder="SA6 7JL" class="form-control" ></p>
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
      origin: 'SA1 3QW',
      destination: 'SA6 7JL',
      travelMode: google.maps.DirectionsTravelMode.DRIVING
    };

    directionsService.route(request, function(response, status) {
      if (status == google.maps.DirectionsStatus.OK) {
        directionsDisplay.setDirections(response);
      }
    });
  </script>




</body>

</html>
