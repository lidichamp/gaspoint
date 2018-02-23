@extends('laravel-authentication-acl::admin.layouts.base-2cols')

@section('title')
Gas Order
@stop
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tour/0.11.0/css/bootstrap-tour-standalone.css" integrity="sha256-OdRIC3/VFxsszf6c8mx8eFrhtR3Ct8sxVXxZwonSUdg=" crossorigin="anonymous" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tour/0.11.0/css/bootstrap-tour.css" integrity="sha256-5i42FaNW1LlUBL5+JijZmOB8fWNnY8ShvUfh0zq4v74=" crossorigin="anonymous" />
<script
      src="https://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.js">
    </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tour/0.11.0/js/bootstrap-tour-standalone.js" integrity="sha256-1oQqWoYRKhIK87UIfRmlDObEHrO1rj2E3lv7cCSV4y0=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tour/0.11.0/js/bootstrap-tour.js" integrity="sha256-dcpQxzRtGFVG4jh959LnxuVArx7apAsvvzZGFpVFXUY=" crossorigin="anonymous"></script>

<script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCdPuT9tawnuhygYPncDc6RVAbXB3DYXI0&libraries=places"></script>
    <script src="../infobubble-compiled.js"></script>
    <script src="../dist/store-locator.min.js"></script>
    <script src="../medicare-static-ds.js"></script>
    <script src="../custom.js"></script>
    <link rel="stylesheet" href="../css/storelocator.css">
    <style>
      body { font-family: sans-serif; }
      #map-canvas, #panel { height: 500px; }
      #panel { width: 300px; float: left; margin-right: 10px; }
      #panel .feature-filter label { width: 130px; }
      p.attribution, p.attribution a { color: #666; }
      .store .hours { color: grey; }
    </style>
<script>
  var tour = new Tour({
  steps: [
  {
    element: "#location-search",
    title: "Delivery Location",
    content: "Enter a location where you would like your gas to be delievered"
  },
  {
    element: "#panel",
    title: "Nearest Agents",
    content: "You'll see the agents nearest to you"
  }
]});

// Initialize the tour
tour.init();

// Start the tour
tour.start();
</script>
@section('content')
<br>
    <div id="panel"></div>
    <div id="map-canvas"></div>
   