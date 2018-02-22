@extends('laravel-authentication-acl::admin.layouts.base-2cols')
<script
			  src="https://code.jquery.com/jquery-3.3.1.js"
			  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
			  crossorigin="anonymous"></script>
@section('title')
Gas Order
@stop

@section('content')
<br>
<br>
<div class="main-container transition--fade">
            <section class="height-100 cover cover-8">
                <div class="col-md-7 col-sm-5">
                    <div class="background-image-holder">
                        <img alt="image" src="../img/hero24.jpg" />
                    </div>
                </div>
                <div class="col-md-5 col-sm-7 bg--white text-center">
                    <div class="pos-vertical-center">
                        <img class="logo" alt="Pillar" src="img/logo-large-dark.png" />
                        <p class="lead">
                            A beautiful collection of
                            <br /> hand-crafted web components
                        </p>
                        <div class="text-left">
                            <form class="geocode" method="get">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="input-with-icon">
                                            <label>Store Name:</label>
                                            <i class="icon icon-Male-2"></i>
                                            <input type="text" name="name" placeholder="Username" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="input-with-icon">
                                            <label>Street:</label>
                                            <i class="icon icon-Male-2"></i>
                                            <input type="text" name="street_address" placeholder="Username" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="input-with-icon">
                                            <label>City:</label>
                                            <i class="icon icon-Male-2"></i>
                                            <input type="text" name="city" placeholder="Username" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="input-with-icon">
                                            <label>State:</label>
                                            <i class="icon icon-Male-2"></i>
                                            <input type="text" name="state" placeholder="Username" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="input-with-icon">
                                            <label>Postal Code:</label>
                                            <i class="icon icon-Male-2"></i>
                                            <input type="text" name="postal_code" placeholder="Username" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="input-with-icon">
                                            <label>Country:</label>
                                            <i class="icon icon-Male-2"></i>
                                            <input type="text" name="country" placeholder="Username" />
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-sm-12 text-center">
                                        <div class="input-checkbox">
                                            <div class="inner"></div>
                                            <input type="checkbox" />
                                        </div>
                                        <span class="type--fine-print">I agree to the
                                            <a href="#">terms and conditions</a>
                                        </span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn--primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>


<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCdPuT9tawnuhygYPncDc6RVAbXB3DYXI0"
        async defer></script>
        <script>
var geocoder;
$(document).ready(function() {
    geocoder = new google.maps.Geocoder();
    $('form.geocode').submit(function(e) {
        var that = this;
        var addr;
        var addrArray = [];
        var addrFields = ['street_address', 'city', 'state', 'postal_code', 'country'];
        $(addrFields).each(function(idx, name) {
            var val = $(this).find('input[name="' + name + '"]').val();
            if (val.length) {
                addrArray.push(val);
            }
        });
        if (addrArray.length) {
            e.preventDefault();
            $(that).unbind('submit');
            var onSuccess = function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    result = results[0].geometry.location;
                    var point = result.lat() + ', ' + result.lng();
                    $(that).prepend('<input type="hidden" name="lat" value="' + result.lat() + '"> <input type="hidden" name="lat" value="' + result.lng() + '">');
                    console.log(point);
                }
                $(that).trigger('submit');
            }
            addr = addrArray.join(', ');
            geocoder.geocode({'address': addr}, onSuccess);
        }
    });
});
</script>
