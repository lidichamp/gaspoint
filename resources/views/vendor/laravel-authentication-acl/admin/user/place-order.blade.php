@extends('laravel-authentication-acl::admin.layouts.base-2cols')

@section('title')
Gas Order
@stop

@section('content')
<div class="pac-card" id="pac-card">
      <div>
       

<div id="type-selector" class="pac-controls">
          <!-- <input type="radio" name="type" id="changetype-all" checked="checked">
          <label for="changetype-all">All</label>

          <input type="radio" name="type" id="changetype-establishment">
          <label for="changetype-establishment">Establishments</label>

          <input type="radio" name="type" id="changetype-address">
          <label for="changetype-address">Addresses</label>

          <input type="radio" name="type" id="changetype-geocode">
          <label for="changetype-geocode">Geocodes</label> -->
        </div>
        <div id="strict-bounds-selector" class="pac-controls">
          <!-- <input type="checkbox" id="use-strict-bounds" value="">
          <label for="use-strict-bounds">Strict Bounds</label> -->
        </div>
      </div>
      <div id="pac-container"><div class="col-md-12 col-sm-12 col-xs-12">
      
  </div>
        <input class="input-with-icon" id="pac-input" type="text"
            placeholder="Where would you like your gas to be delivered?">
    <input type="button" id="searchButton" class="btn btn-info" style="background-color:black" value="Find An Agent" onclick ="searchLocations()"/>
      </div>
    </div>

    <div><select id="locationSelect" style="width: 10%; visibility: hidden"></select></div>
    <div id="map"></div>
    <div id="infowindow-content">
      <img src="" width="16" height="16" id="place-icon">
      <span id="place-name"  class="title"></span><br>
      <span id="place-address"></span>
    </div>
    <script>
      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?region=ng&key=YOUR_API_KEY&libraries=places">

      var markers = [];
      var infoWindow;
      var locationSelect;
      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          //center: {lat: -33.8688, lng: 151.2195},
          center: {lat: 9.0820, lng: 8.6753},
          zoom: 13
        });

       // searchButton = document.getElementById("searchButton").onclick = searchLocations;
        var card = document.getElementById('pac-card');
        var input = document.getElementById('pac-input');
        var types = document.getElementById('type-selector');
        var strictBounds = document.getElementById('strict-bounds-selector');
        
        map.controls[google.maps.ControlPosition.TOP_RIGHT].push(card);

        var autocomplete = new google.maps.places.Autocomplete(input);

        // Bind the map's bounds (viewport) property to the autocomplete object,
        // so that the autocomplete requests use the current map bounds for the
        // bounds option in the request.
        autocomplete.bindTo('bounds', map);

        var infowindow = new google.maps.InfoWindow();
        var infowindowContent = document.getElementById('infowindow-content');
        infowindow.setContent(infowindowContent);
        var marker = new google.maps.Marker({
          map: map,
          anchorPoint: new google.maps.Point(0, -29)
        });

        autocomplete.addListener('place_changed', function() {
          infowindow.close();
          marker.setVisible(false);
          var place = autocomplete.getPlace();
          if (!place.geometry) {
            // User entered the name of a Place that was not suggested and
            // pressed the Enter key, or the Place Details request failed.
            window.alert("No details available for input: '" + place.name + "'");
            return;
          }

          // If the place has a geometry, then present it on a map.
          if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
          } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);  // Why 17? Because it looks good.
          }
          marker.setPosition(place.geometry.location);
          marker.setVisible(false);

          var address = '';
          if (place.address_components) {
            address = [
              (place.address_components[0] && place.address_components[0].short_name || ''),
              (place.address_components[1] && place.address_components[1].short_name || ''),
              (place.address_components[2] && place.address_components[2].short_name || '')
            ].join(' ');
          }

          infowindowContent.children['place-icon'].src = place.icon;
          infowindowContent.children['place-name'].textContent = place.name;
          infowindowContent.children['place-address'].textContent = address;
          infowindow.open(map, marker);
        });

        // Sets a listener on a radio button to change the filter type on Places
        // Autocomplete.
        function setupClickListener(id, types) {
          var radioButton = document.getElementById(id);
          radioButton.addEventListener('click', function() {
            autocomplete.setTypes(types);
          });
        }

        setupClickListener('changetype-all', []);
        setupClickListener('changetype-address', ['address']);
        setupClickListener('changetype-establishment', ['establishment']);
        setupClickListener('changetype-geocode', ['geocode']);

        document.getElementById('use-strict-bounds')
            .addEventListener('click', function() {
              console.log('Checkbox clicked! New state=' + this.checked);
              autocomplete.setOptions({strictBounds: this.checked});
            });
      }
      
  //     function searchLocations() {
  //        var address = document.getElementById('pac-input').value;
         
  //        var geocoder = new google.maps.Geocoder();
         
  //        geocoder.geocode({address: address}, function(results, status) {
           
  //          if (status == google.maps.GeocoderStatus.OK) {
  //           console.log(results[0].geometry.location.lng());
  //           searchLocationsNear(results[0].geometry.location);
            
  //          } else {
  //            alert(address + ' not found');
  //          }
  //        });
  //      }

  //      function clearLocations() {
  //        infoWindow.close();
  //        for (var i = 0; i < markers.length; i++) {
  //          markers[i].setMap(null);
  //        }
  //        markers.length = 0;

  //        locationSelect.innerHTML = "";
  //        var option = document.createElement("option");
  //        option.value = "none";
  //        option.innerHTML = "See all results:";
  //        locationSelect.appendChild(option);
  //      }

  //      function searchLocationsNear(center) {
  //        //clearLocations();

  //        var radius = "30";
  //        var searchUrl = 'stores/nearest/?lat=' + center.lat() + '&lng=' + center.lng();
  //        console.log(searchUrl);
  //        downloadUrl(searchUrl, function(data) {
  //          var xml = parseXml(data);
  //          var storeNodes = xml.documentElement.getElementsByTagName("store");
  //          var bounds = new google.maps.LatLngBounds();
  //          for (var i = 0; i < storeNodes.length; i++) {
  //            var id =storeNodes[i].getAttribute("id");
  //            var name = storeNodes[i].getAttribute("name");
  //            var address = storeNodes[i].getAttribute("address");
  //            var distance=30;
  //            var latlng = new google.maps.LatLng(
  //                 parseFloat(storeNodes[i].getAttribute("lat")),
  //                 parseFloat(storeNodes[i].getAttribute("lng")));

  //            createOption(name, distance, i);
  //            createMarker(latlng, name, address);
  //            bounds.extend(latlng);
  //          }
  //          map.fitBounds(bounds);
  //          locationSelect.style.visibility = "visible";
  //          locationSelect.onchange = function() {
  //            var markerNum = locationSelect.options[locationSelect.selectedIndex].value;
  //            google.maps.event.trigger(markers[markerNum], 'click');
  //          };
  //        });
  //      }

  //      function createMarker(latlng, name, address) {
  //         var html = "<b>" + name + "</b> <br/>" + address;
  //         var marker = new google.maps.Marker({
  //           map: map,
  //           position: latlng
  //         });
  //         google.maps.event.addListener(marker, 'click', function() {
  //           infoWindow.setContent(html);
  //           infoWindow.open(map, marker);
  //         });
  //         markers.push(marker);
  //       }

  //      function createOption(name, distance, num) {
  //         var option = document.createElement("option");
  //         option.value = num;
  //         option.innerHTML = name;
  //         locationSelect.appendChild(option);
  //      }

  //      function downloadUrl(url, callback) {
  //         var request = window.ActiveXObject ?
  //             new ActiveXObject('Microsoft.XMLHTTP') :
  //             new XMLHttpRequest;

  //         request.onreadystatechange = function() {
  //           if (request.readyState == 4) {
  //             request.onreadystatechange = doNothing;
  //             callback(request.responseText, request.status);
  //           }
  //         };

  //         request.open('GET', url, true);
  //         request.send(null);
  //      }

  //      function parseXml(str) {
  //         if (window.ActiveXObject) {
  //           var doc = new ActiveXObject('Microsoft.XMLDOM');
  //           doc.loadXML(str);
  //           return doc;
  //         } else if (window.DOMParser) {
  //           return (new DOMParser).parseFromString(str, 'text/xml');
  //         }
  //      }

  //      function doNothing() {}
    function searchLocations() {
         var address = document.getElementById("pac-input").value;
         
         var geocoder = new google.maps.Geocoder();
         geocoder.geocode({address: address}, function(results, status) {
         
           if (status == google.maps.GeocoderStatus.OK) {
            searchLocationsNear(results[0].geometry.location);
            console.log(address)
           } else {
             alert(address + ' not found');
           }
         });
       }

       function clearLocations() {
         infoWindow.close();
         for (var i = 0; i < markers.length; i++) {
           markers[i].setMap(null);
         }
         markers.length = 0;

         locationSelect.innerHTML = "";
         var option = document.createElement("option");
         option.value = "none";
         option.innerHTML = "See all results:";
         locationSelect.appendChild(option);
       }

       function searchLocationsNear(center) {
         clearLocations();

       var radius = 30;
        var searchUrl = 'stores/nearest/?lat=' + center.lat() + '&lng=' + center.lng();
         downloadUrl(searchUrl, function(data) {
           var xml = parseXml(data);
           var markerNodes = xml.documentElement.getElementsByTagName("marker");
           var bounds = new google.maps.LatLngBounds();
           for (var i = 0; i < markerNodes.length; i++) {
             var id = markerNodes[i].getAttribute("id");
             var name = markerNodes[i].getAttribute("name");
             var address = markerNodes[i].getAttribute("address");
             var distance = parseFloat(markerNodes[i].getAttribute("distance"));
             var latlng = new google.maps.LatLng(
                  parseFloat(markerNodes[i].getAttribute("lat")),
                  parseFloat(markerNodes[i].getAttribute("lng")));

             createOption(name, distance, i);
             createMarker(latlng, name, address);
             bounds.extend(latlng);
           }
           map.fitBounds(bounds);
           locationSelect.style.visibility = "visible";
           locationSelect.onchange = function() {
             var markerNum = locationSelect.options[locationSelect.selectedIndex].value;
             google.maps.event.trigger(markers[markerNum], 'click');
           };
         });
       }

       function createMarker(latlng, name, address) {
          var html = "<b>" + name + "</b> <br/>" + address;
          var marker = new google.maps.Marker({
            map: map,
            position: latlng
          });
          google.maps.event.addListener(marker, 'click', function() {
            infoWindow.setContent(html);
            infoWindow.open(map, marker);
          });
          markers.push(marker);
        }

       function createOption(name, distance, num) {
          var option = document.createElement("option");
          option.value = num;
          option.innerHTML = name;
          locationSelect.appendChild(option);
       }

       function downloadUrl(url, callback) {
          var request = window.ActiveXObject ?
              new ActiveXObject('Microsoft.XMLHTTP') :
              new XMLHttpRequest;

          request.onreadystatechange = function() {
            if (request.readyState == 4) {
              request.onreadystatechange = doNothing;
              callback(request.responseText, request.status);
            }
          };

          request.open('GET', url, true);
          request.send(null);
       }

       function parseXml(str) {
          if (window.ActiveXObject) {
            var doc = new ActiveXObject('Microsoft.XMLDOM');
            doc.loadXML(str);
            return doc;
          } else if (window.DOMParser) {
            return (new DOMParser).parseFromString(str, 'text/xml');
          }
       }

       function doNothing() {}
  </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCdPuT9tawnuhygYPncDc6RVAbXB3DYXI0&libraries=places&callback=initMap"
        async defer></script>
