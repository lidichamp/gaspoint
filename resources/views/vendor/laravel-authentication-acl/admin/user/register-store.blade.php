@extends('laravel-authentication-acl::admin.layouts.base-2cols')
<script
			  src="https://code.jquery.com/jquery-3.3.1.js"
			  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
			  crossorigin="anonymous"></script>
@section('title')
Gas Order
@stop

        <link href="../../../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        <link href="../../../css/socicon.css" rel="stylesheet" type="text/css" media="all" />
        <link href="../../../css/iconsmind.css" rel="stylesheet" type="text/css" media="all" />
        <link href="../../../css/interface-icons.css" rel="stylesheet" type="text/css" media="all" />
        <link href="../../../css/owl.carousel.css" rel="stylesheet" type="text/css" media="all" />
        <link href="../../../css/lightbox.min.css" rel="stylesheet" type="text/css" media="all" />
        <link href="../../../css/theme.css" rel="stylesheet" type="text/css" media="all" />
        <link href="../../../css/custom.css" rel="stylesheet" type="text/css" media="all" />
        <link href='https://fonts.googleapis.com/css?family=Lora:400,400italic,700%7CMontserrat:400,700' rel='stylesheet' type='text/css'>
   
    {!!  HTML::style('packages/jacopo/laravel-authentication-acl/css/bootstrap.min.css')  !!}
    {!!  HTML::style('packages/jacopo/laravel-authentication-acl/css/style.css')  !!}
    {!!  HTML::style('packages/jacopo/laravel-authentication-acl/css/strength.css')  !!}
    {!!  HTML::style('//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css')  !!}
    {!!  HTML::style('packages/jacopo/laravel-authentication-acl/css/fonts.css')  !!}

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->


@section('content')
<body class="scroll-assist" >
        <a id="top"></a>
        <div class="loader"></div>
<nav class="transition--fade">
            <div class="nav-bar" data-fixed-at="200">
                <div class="nav-module logo-module left">
                    <a href="index.html">
                        <img class="logo logo-dark" alt="logo" src="../../../img/logo-dark.png" />
                        <img class="logo logo-light" alt="logo" src="../../../img/logo-light.png" />
                    </a>
                </div>
                <div class="nav-module menu-module left">
                    <ul class="menu">
                       
                    </ul>
                </div>
                <!--end nav module-->
                <div class="nav-module right">
                    <a href="user/signup" class="nav-function" >
                        <i style="color:black" class="icon icon-Male-2"></i>
                        <span>Sign Up</span>
                    </a>
                </div>
                <div class="nav-module right">
                    <a href="#" class="nav-function modal-trigger" >
                        <i style="color:black" class="icon icon-Security-Check"></i>
                        <span>Log in</span>
                    </a>
                </div>
            </div>
            <!--end nav bar-->
            <div class="nav-mobile-toggle visible-sm visible-xs">
                <i class="icon-Align-Right icon icon--sm"></i>
            </div>
        </nav>
       
<div class="container">
    <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
            <div class="panel panel-info">
 
                <?php $message = Session::get('message'); ?>
                @if( isset($message) )
                <div class="alert alert-success">{!! $message !!}</div>
                @endif
                <div class="panel-body">
                    {!! Form::open(["route" => 'store.save', "method" => "POST", "id" => "store_reg"]) !!}
                       
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="input-with-icon">
                        <i class="icon icon-Shop-2"></i>
                        
                                        {!! Form::text('name', '',['id' => 'name', 'class' => 'form-control', 'placeholder' => 'Store name', 'required', 'autocomplete' => 'off']) !!}
                                        </div>
                                    <span class="text-danger">{!! $errors->first('name') !!}</span>
                                
                            </div></div>
                            <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="input-with-icon">
                            <i class="icon icon-Map-Marker2"></i>
                            
                                         {!! Form::text('street_name','',  ['id' => 'street_name', 'class' => 'form-control', 'placeholder' => 'Street Name', 'required', 'autocomplete' => 'off']) !!}
                                         </div>
                                    <span class="text-danger">{!! $errors->first('street_name') !!}</span>
                              
                            </div>
                        </div>

                        <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="input-with-icon"><i class="icon icon-Shop"></i>
                               {!! Form::text('city', '',['id' => 'city','', 'class' => 'form-control', 'placeholder' => 'city', 'required', 'autocomplete' => 'off']) !!}
                                    </div>
                                    <span class="text-danger">{!! $errors->first('city') !!}</span>
                                </div>
                            </div>
                        <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="input-with-icon"><i class="icon icon-Ship"></i>
                                                {!! Form::text('state', '',['id' => 'state', 'class' => 'form-control', 'placeholder' => 'state', 'required', 'autocomplete' => 'off']) !!}
                            </div>
                            <span class="text-danger">{!! $errors->first('state') !!}</span>
                        </div></div>

                          
                        <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="input-with-icon"><i class="icon icon-Flag-2"></i>
                                            {!! Form::text('country', '',['class' => 'form-control', 'id' =>'country', 'placeholder' => 'Country', 'required']) !!}
                                    </div>
                                </div>
                            </div>

                        <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="input-with-icon"><i class="icon icon-Fingerprint-2"></i>
                               {!! Form::text('postal_code', '',['id' => 'postal_code', 'class' => 'form-control', 'placeholder' => 'postal_code', 'required', 'autocomplete' => 'off']) !!}
                                    </div>
                                    <span class="text-danger">{!! $errors->first('city') !!}</span>
                                </div>
                            </div>
                            
                <div class="row">
                    <div class="col-xs-3 col-sm-3 col-xs-3 margin-top-10"></div>
                    <div class="col-xs-6 col-sm-6 col-xs-6 margin-top-10">
                    <input class="btn" type="submit" value="Register" >
                    </div></div>
                        </form>
                <div class="row">
                    <div class="col-xs-2 col-sm-2 col-xs-2 margin-top-10"></div>
                    <div class="col-xs-10 col-sm-10 col-xs-10 margin-top-10">
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
  {{-- Js files --}}
  {!! HTML::script('packages/jacopo/laravel-authentication-acl/js/vendor/jquery-1.10.2.min.js') !!}
  {!! HTML::script('packages/jacopo/laravel-authentication-acl/js/vendor/password_strength/strength.js') !!}

  <script>
    $(document).ready(function() {
      //------------------------------------
      // password checking
      //------------------------------------
      var password1 		= $('#password1'); //id of first password field
      var password2		= $('#password2'); //id of second password field
      var passwordsInfo 	= $('#pass-info'); //id of indicator element

      passwordStrengthCheck(password1,password2,passwordsInfo);

      //------------------------------------
      // captcha regeneration
      //------------------------------------

      $("#captcha-gen-button").click(function(e){
      		e.preventDefault();

      		$.ajax({
              url: "/captcha-ajax",
              method: "POST",
              headers: { 'X-CSRF-Token' : '{!! csrf_token() !!}' }
            }).done(function(image) {
              $("#captcha-img-container").html(image);
            });
      	});
    });
  </script>
    <script src="../../../js/jquery-2.1.4.min.js"></script>
        <script src="../../../js/isotope.min.js"></script>
        <script src="../../../js/ytplayer.min.js"></script>
        <script src="../../../js/easypiechart.min.js"></script>
        <script src="../../../js/owl.carousel.min.js"></script>
        <script src="../../../js/lightbox.min.js"></script>
        <script src="../../../js/twitterfetcher.min.js"></script>
        <script src="../../../js/smooth-scroll.min.js"></script>
        <script src="../../../js/scrollreveal.min.js"></script>
        <script src="../../../js/parallax.js"></script>
        <script src="../../../js/scripts.js"></script>
   

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
