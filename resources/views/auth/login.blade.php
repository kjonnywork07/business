<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Social CRM</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('/dist/css/adminlte.min.css') }}">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  @if (Session::has('success'))
    <div class="alert alert-success">{{ Session::get('success') }}</div>
  @endif
  @if (Session::has('danger'))
    <div class="alert alert-danger">{{ Session::get('danger') }}</div>
  @endif

  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="javascript:void(0)" class="h1">
        <img src="{{ asset('/dist/img/AdminLTELogo.png') }}" alt="site Logo" class="brand-image elevation-3" style="opacity: .8" width="200px">
      </a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <p class="login-box-msg text-danger">{{ $error }}</p>
            @endforeach
        @endif

      <form action="{{ route('login')}}" method="post">
          @csrf
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" id="email" name="email" required="required" autofocus="autofocus" >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password"  name="password" required="required" autocomplete="current-password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember" name="remember" >
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
        <div class="row">
          
          <!-- /.col -->
          <div class="col-6 ">
            <a href="{{route('register')}}" class="btn btn-link  pl-0" >Register</a>
          </div>
          <div class="col-6 ">
            <a href="{{route('password.request')}}" class="btn btn-link float-right pr-0" >Forgot Password</a>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ asset('/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('/dist/js/adminlte.min.js') }}"></script>
</body>
</html>


 