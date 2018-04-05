@extends('admin.layout.auth')

@section('content')
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Gas</b>POINT</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>
    <form role="form" method="POST" action="{{ url('/admin/login') }}">
                   
    {{ csrf_field() }}

    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
      <div class="form-group has-feedback">
        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
      </div>
    </div>
    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
      <div class="form-group has-feedback">
      <input id="password" type="password" class="form-control" name="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
        </div>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox" name="remember"> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>


    <a href="{{ url('/admin/password/reset') }}">I forgot my password</a><br>
    <a href="{{ url('/admin/register') }}" class="text-center">Sign Up</a>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
@endsection
