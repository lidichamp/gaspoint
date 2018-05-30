

<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Agent Registration</title>
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  
      <link rel="stylesheet" href="/css/style.css">

  
</head>

<body class="hold-transition register-page" style="background-color:#18bc9c">
<div class="register-box">
  <div class="register-logo">
    <a href="/" style="color:#fff"><img src="/img/logo.png" width="50%"></a>
  </div>

<form method="POST" action="{{ url('/agent/save') }}">
                        {{ csrf_field() }}

  <div id="msform">
    <!-- progressbar -->
    <ul id="progressbar">
      <li class="active">Account Setup</li>
      <li>Store creation</li>
      <li>Store Setup</li>
    </ul>
    <!-- fieldsets -->
    <fieldset>
      <h2 class="fs-title">Create your account</h2>
      <input id="name" type="text" class="form-control" name="name" placeholder="Full name" value="{{ old('name') }}" autofocus required>
      <input id="email" type="email" class="form-control" name="email" placeholder="Email" value="{{ old('name') }}" required>
      <input id="password" type="password" class="form-control" placeholder="Password" name="password" required>
      <input id="password-confirm" type="password" class="form-control" placeholder="Confirm password" name="password_confirmation" required>
      <input type="button" name="next" class="next action-button" style="background-color:#1a252f" value="Next" />
    </fieldset>
    <fieldset>
      <h2 class="fs-title">Create Your Store</h2>
      <input type="text" name="businessname" placeholder="Business Name" value="{{ old('businessname') }}" required/>
      <input type="text" name="state" placeholder="State where store is located" value="{{ old('state') }}" required/>
      <input type="text" id="city" name="city" placeholder="City where store is located" value="{{ old('city') }}" required/>
      <input type="text" name="telephone" placeholder="Telephone Number" value="{{ old('store') }}" required/>
      <input type="button" name="previous" class="previous action-button" style="background-color:#1a252f" value="Previous" />
      <input type="button" name="next" class="next action-button" style="background-color:#1a252f" value="Next" />
    </fieldset>
    <fieldset>
      <h2 class="fs-title">Set up your store</h2>
      <textarea name="address" placeholder="Address" value="{{ old('address') }}"></textarea>
      <input type="text" id="postcode" placeholder="Post code" value="{{ old('postcode') }}" name="postcode" required/>
      <input type="text" name="hours1" placeholder="Weekdays hours" value="{{ old('hours1') }}" required/>
      <input type="text" name="hours2" placeholder="Saturday hours" value="{{ old('hours2') }}" required/>
      <input type="text" name="hours3" placeholder="Sunday hours" value="{{ old('hours3') }}" required/>
      <input type="hidden" id="lat" name="lat" required/>
      <input type="hidden" id="lng" name="lng"  required/>
      <input type="button" name="previous" class="previous action-button" style="background-color:#1a252f" value="Previous"/>
      <input type="submit" name="submit" class="submit action-button" style="background-color:#1a252f" value="Submit" />
    </fieldset>
  </div>
</form>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>

  
<script>
    
    var placeSearch, autocomplete;
    var componentForm = {
      street_number: 'short_name',
      route: 'long_name',
      locality: 'long_name',
      administrative_area_level_1: 'short_name',
      country: 'long_name',
      postal_code: 'short_name'
    };

    function initAutocomplete() {
      // Create the autocomplete object, restricting the search to geographical
      // location types.
      autocomplete = new google.maps.places.Autocomplete(
          /** @type {!HTMLInputElement} */(document.getElementById('city')),
          {types: ['geocode']});

      // When the user selects an address from the dropdown, populate the address
      // fields in the form.
      autocomplete.addListener('place_changed', fillInAddress);
    }

    function fillInAddress() {
      // Get the place details from the autocomplete object.
      var place = autocomplete.getPlace();
          document.getElementById('city').value = place.name;
          document.getElementById('lat').value = place.geometry.location.lat();
          document.getElementById('lng').value = place.geometry.location.lng();
          
      // Get each component of the address from the place details
      // and fill the corresponding field on the form.
      for (var i = 0; i < place.address_components.length; i++) {
        var addressType = place.address_components[i].types[0];
        
      }
    }

  </script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCdPuT9tawnuhygYPncDc6RVAbXB3DYXI0&libraries=places&callback=initAutocomplete"></script> 

    <script  src="/js/index.js"></script>




</body>

</html>
