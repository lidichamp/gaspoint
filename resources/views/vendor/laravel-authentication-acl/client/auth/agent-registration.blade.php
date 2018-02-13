<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>User signup</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
</head>

<body background="../../../img/hero2.jpg" class="scroll-assist" >
        <a id="top"></a>
        <div class="loader"></div>
<nav class="transition--fade">
            <div class="nav-bar" data-fixed-at="200">
                <div class="nav-module logo-module left">
                    <a href="#">
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
       
<div class="container" >
    <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
            <div class="panel panel-info">
 
                <?php $message = Session::get('message'); ?>
                @if( isset($message) )
                <div class="alert alert-success">{!! $message !!}</div>
                @endif
                <div class="panel-body">
                    {!! Form::open(["route" => 'user.signup.process', "method" => "POST", "id" => "user_signup"]) !!}
                    {{-- Field hidden to fix chrome and safari autocomplete bug --}}
                    {!! Form::password('__to_hide_password_autocomplete', ['class' => 'hidden']) !!}
                       
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="input-with-icon">
                        <i class="icon icon-Male-2"></i>
                        
                                        {!! Form::text('first_name', '', ['id' => 'first_name', 'class' => 'form-control', 'placeholder' => 'First Name', 'required', 'autocomplete' => 'off']) !!}
                                        </div>
                                    <span class="text-danger">{!! $errors->first('first_name') !!}</span>
                                
                            </div></div>
                            <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="input-with-icon">
                            <i class="icon icon-Male-2"></i>
                            
                                         {!! Form::text('last_name', '', ['id' => 'last_name', 'class' => 'form-control', 'placeholder' => 'Last Name', 'required', 'autocomplete' => 'off']) !!}
                                         </div>
                                    <span class="text-danger">{!! $errors->first('last_name') !!}</span>
                                    
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="input-with-icon"><i class="icon icon-Envelope"></i>
                                                {!! Form::email('email', '', ['id' => 'email', 'class' => 'form-control', 'placeholder' => 'Email address', 'required', 'autocomplete' => 'off']) !!}
                            </div>
                            <span class="text-danger">{!! $errors->first('email') !!}</span>
                        </div></div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="input-with-icon">
                            <i class="icon icon-Tag-2"></i>
                            
                                         {!! Form::text('store_name', '', ['id' => 'store_name', 'class' => 'form-control', 'placeholder' => 'Store Name', 'required', 'autocomplete' => 'off']) !!}
                                         </div>
                                    <span class="text-danger">{!! $errors->first('store_name') !!}</span>
                              
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="input-with-icon">
                            <i class="icon icon-Shop-4"></i>
                            
                                         {!! Form::text('store_address', '', ['id' => 'store_address', 'class' => 'form-control', 'placeholder' => 'Store Address', 'required', 'autocomplete' => 'off']) !!}
                                         </div>
                                    <span class="text-danger">{!! $errors->first('store_address') !!}</span>
                              
                            </div>
                        </div>
                       
                        <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="input-with-icon"><i class="icon icon-Lock"></i>
                               {!! Form::password('password', ['id' => 'password1', 'class' => 'form-control', 'placeholder' => 'Password', 'required', 'autocomplete' => 'off']) !!}
                                    </div>
                                    <span class="text-danger">{!! $errors->first('password') !!}</span>
                                </div>
                            </div>
                          
                        <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="input-with-icon"><i class="icon icon-Security-Check"></i>
                                            {!! Form::password('password_confirmation', ['class' => 'form-control', 'id' =>'password2', 'placeholder' => 'Confirm password', 'required']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                              <div class="form-group">
                                <div id="pass-info"></div>
                              </div>
                            </div>

                            {{-- Captcha validation --}}
                            @if(isset($captcha) )
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span id="captcha-img-container">
                                            @include('laravel-authentication-acl::client.auth.captcha-image')
                                        </span>
                                        <a id="captcha-gen-button" href="#" class="btn btn-small btn-info margin-left-5"><i class="fa fa-refresh"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-picture-o"></i></span>
                                        {!! Form::text('captcha_text',null, ['class'=> 'form-control', 'placeholder' => 'Fill in with the text of the image', 'required', 'autocomplete' => 'off']) !!}
                                    </div>
                                </div>
                                <span class="text-danger">{!! $errors->first('captcha_text') !!}</span>
                            </div>
                            @endif
                        </div>
                <div class="row">
                    <div class="col-xs-3 col-sm-3 col-xs-3 margin-top-10"></div>
                    <div class="col-xs-8 col-sm-4 col-xs-4 margin-top-10">
                    <input class="btn" type="submit" value="Register" >
                    </div></div>
                        </form>
                <div class="row">
                    <div class="col-xs-2 col-sm-2 col-xs-2 margin-top-10"></div>
                    <div class="col-xs-10 col-sm-10 col-xs-10 margin-top-10">
                        {!! link_to_route('user.login','Already have an account? Login here') !!}
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
   
</body>
</html>