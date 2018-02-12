<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>GasPoint</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/socicon.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/iconsmind.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/interface-icons.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/owl.carousel.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/lightbox.min.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/theme.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/custom.css" rel="stylesheet" type="text/css" media="all" />
        <link href='https://fonts.googleapis.com/css?family=Lora:400,400italic,700%7CMontserrat:400,700' rel='stylesheet' type='text/css'>
    </head>
    <body class="scroll-assist">
        <a id="top"></a>
        <div class="loader"></div>
        <nav class="transition--fade">
            <div class="nav-bar nav--absolute nav--transparent" data-fixed-at="200">
                <div class="nav-module logo-module left">
                    <a href="index.html">
                        <img class="logo logo-dark" alt="logo" src="img/logo-dark.png" />
                        <img class="logo logo-light" alt="logo" src="img/logo-light.png" />
                    </a>
                </div>
                <div class="nav-module menu-module left">
                    <ul class="menu">
                       
                    </ul>
                </div>
                <!--end nav module-->
                <div class="nav-module right">
                    <a href="user/signup" class="nav-function" >
                        <i class="icon icon-Male-2"></i>
                        <span>Sign Up</span>
                    </a>
                </div>
                <div class="nav-module right">
                    <a href="#" class="nav-function modal-trigger" >
                        <i class="icon icon-Security-Check"></i>
                        <span>Log in</span>
                    </a>
                </div>
            </div>
            <!--end nav bar-->
            <div class="nav-mobile-toggle visible-sm visible-xs">
                <i class="icon-Align-Right icon icon--sm"></i>
            </div>
        </nav>
            <!--end of modal-content-->
        </div>
        <!--end of modal-container-->
        <div class="main-container transition--fade">
            <section class="cover cover-12 form--dark imagebg height-100 parallax" data-overlay="4">
                <div class="background-image-holder">
                    <img alt="image" src="img/hero2.jpg" />
                </div>
                <div class="container pos-vertical-center text-center-xs">
                    <div class="row pos-vertical-align-columns">
                        <div class="col-md-7 col-sm-8 col-sm-offset-2">
                            <h2>Get cooking gas, in no time with Gas point</h2> 
                            <a href="/agent/signup"><span style="color:white;"><i class="icon icon-Betvibes"></i>
                             <span class="h6" style="font-size:10px">  Sign up as an agent</span></span> </a>
                            
                            <!--end of modal instance-->
                        </div>
                        <div class="col-md-5 col-sm-8 col-sm-offset-2">
                            <div class="form-subscribe-1 boxed boxed--lg bg--white text-center box-shadow-wide">
                                <h4>Log in</h4>
                                <?php $message = Session::get('message'); ?>
                                @if( isset($message) )
                                <div class="alert alert-success">{{$message}}</div>
                                @endif
                                @if($errors && ! $errors->isEmpty() )
                                @foreach($errors->all() as $error)
                                <div class="alert alert-danger">{{$error}}</div>
                                @endforeach
                                @endif
                                <div class="panel-body">
                                    {!! Form::open(array('url' => URL::route("user.login.process"), 'method' => 'post') ) !!}
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <div class="input-with-icon">
                                                    <span class="input-group-addon"><i class="icon icon-Envelope"></i></span>
                                                    {!! Form::email('email', '', ['id' => 'email', 'class' => 'form-control', 'placeholder' => 'Email address', 'required', 'autocomplete' => 'off']) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <div class="input-with-icon">
                                                    <span class="input-group-addon"><i class="icon icon-Security-Check"></i></span>
                                                    {!! Form::password('password', ['id' => 'password', 'class' => 'form-control', 'placeholder' => 'Password', 'required', 'autocomplete' => 'off']) !!}
                                                   </div>
                                            </div>
                                        </div>
                                    </div>
                                    {!! Form::label('remember','Remember me') !!}
                                    {!! Form::checkbox('remember') !!}
                                    <input type="submit" value="Login" class="btn btn-info btn-block">
                                    {!! Form::close() !!}
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 margin-top-10">
                                            {!! link_to_route('user.reminder.process','Forgot password?') !!}
                                       </div>
                                   </div>
                               </div>
                        </div>
                    </div>
                    <!--end row-->
                </div>
                <!--end container-->
            </section>
            <footer class="footer-2 text-center-xs bg--white">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8">
                            <ul class="footer__navigation">
                                <li>
                                    <a href="#">
                                        About
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        Terms
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        Careers
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        Contact
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-sm-4 text-right text-center-xs">
                            <ul class="social-list">
                                <li>
                                    <a href="#">
                                        <i class="socicon-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="socicon-dribbble"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="socicon-vimeo"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="socicon-instagram"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!--end row-->
                    <div class="row">
                        <div class="col-sm-12">
                            <a href="#" class="type--underline">
                                hello@pillarstudio.net
                            </a>
                        </div>
                    </div>
                    <!--end row-->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="footer__lower">
                                <span class="type--fine-print">&copy; Copyright
                                    <span class="update-year">2018</span> Gas Point - All Rights Reserved</span>
                            </div>
                        </div>
                    </div>
                    <!--end row-->
                </div>
                <!--end container-->
            </footer>
        </div>
        <script src="js/jquery-2.1.4.min.js"></script>
        <script src="js/isotope.min.js"></script>
        <script src="js/ytplayer.min.js"></script>
        <script src="js/easypiechart.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/lightbox.min.js"></script>
        <script src="js/twitterfetcher.min.js"></script>
        <script src="js/smooth-scroll.min.js"></script>
        <script src="js/scrollreveal.min.js"></script>
        <script src="js/parallax.js"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>