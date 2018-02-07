{{-- Layout base admin panel --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #description {
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
      }

      #infowindow-content .title {
        font-weight: bold;
      }

      #infowindow-content {
        display: none;
      }

      #map #infowindow-content {
        display: inline;
      }

      .pac-card {
        margin: 10px 10px 0 0;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        background-color: #fff;
        font-family: Roboto;
      }

      #pac-container {
        padding-bottom: 12px;
        margin-right: 12px;
      }

      .pac-controls {
        display: inline-block;
        padding: 5px 11px;
      }

      .pac-controls label {
        font-family: Roboto;
        font-size: 13px;
        font-weight: 300;
      }

      #pac-input {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-left: 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 400px;
      }

      #pac-input:focus {
        border-color: #4d90fe;
      }

      #title {
        color: #fff;
        background-color: #4d90fe;
        font-size: 25px;
        font-weight: 500;
        padding: 6px 12px;
      }
 
</style>
    {!! HTML::style('css/socicon.css') !!}
        {!! HTML::style('css/iconsmind.css') !!}
            {!! HTML::style('css/interface-icons.css') !!}
                                {!! HTML::style('//fonts.googleapis.com/css?family=Lora:400,400italic,700%7CMontserrat:400,700' ) !!}
   
    {!! HTML::style('packages/jacopo/laravel-authentication-acl/css/bootstrap.min.css') !!}
    {!! HTML::style('packages/jacopo/laravel-authentication-acl/css/style.css') !!}
    {!! HTML::style('packages/jacopo/laravel-authentication-acl/css/baselayout.css') !!}
    {!! HTML::style('packages/jacopo/laravel-authentication-acl/css/fonts.css') !!}
    {!! HTML::style('//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css') !!}
<!-- 
    {!! HTML::style('jquery.placecomplete.css') !!} -->
    {!! HTML::style('//cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css') !!}

    @yield('head_css')
    {{-- End head css --}}
    
    {!! HTML::script('packages/jacopo/laravel-authentication-acl/js/vendor/jquery-1.10.2.min.js') !!}
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
       {!! HTML::script('https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js') !!}
       {!! HTML::script('https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js') !!}
    <![endif]-->
</head>

    <body>
        {{-- navbar --}}
        @include('laravel-authentication-acl::admin.layouts.navbar')

        {{-- content --}}
        <div class="container-fluid">
            @yield('container')
        </div>

        {{-- Start footer scripts --}}
        @yield('before_footer_scripts')

        {!! HTML::script('packages/jacopo/laravel-authentication-acl/js/vendor/bootstrap.min.js') !!}
        {!! HTML::script('//cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js') !!}
        {!! HTML::script('//cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js') !!}

        
        @yield('footer_scripts')
        {{-- End footer scripts --}}
    </body>
</html>