@extends('laravel-authentication-acl::admin.layouts.base-2cols')

@section('title')
Gas Order
@stop

<script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCdPuT9tawnuhygYPncDc6RVAbXB3DYXI0&libraries=places"></script>
    <script
      src="https://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js">
    </script>
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

@section('content')
<br>
    <div id="panel"></div>
    <div id="map-canvas"></div>
   