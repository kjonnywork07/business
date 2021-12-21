<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Forgot Password</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('/dist/css/adminlte.min.css')}}">
</head>
<body class="hold-transition register-page">
    @if (isset($errors) && count($errors)>0)
        <div class="alert alert-danger">
    </div>
 @endif
    
<div class="register-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
        <img src="{{ asset('/dist/img/AdminLTELogo.png') }}" alt="site Logo" class="brand-image elevation-3" style="opacity: .8" width="200px">
    </div>
    <div class="card-body">
      {{-- <p class="login-box-msg">Register a new membership</p> --}}

      <form method="POST" action="{{ route('password.update') }}" >
        @csrf
        <input type="hidden" name="token" value="{{ $request->route('token') }}">
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="email" value="{{old('email', $request->email)}}"  required autofocus >
        </div>
        <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password" name="password" required autocomplete="new-password">
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Retype password" name="password_confirmation" required >
          </div>
        <div class="row">
          <div class="col-4">
            <a href="{{ route('login') }}" class="text-center">Login</a>
          </div>
          <!-- /.col -->
          <div class="col-8">
            <button type="submit" class="btn btn-primary btn-block">Reset Password</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('/dist/js/adminlte.min.js')}}"></script>
@if (isset($errors) && count($errors)>0)
            <script>
                $(document).ready(function() {
                    var data= {!!$errors!!}; 
                    var html ='';
                    $.each(data,function (i,item) {
                        html += item+"<br>";
                    })
                    $('.alert').html(html);
                });
            </script>
 @endif
</body>
</html>

