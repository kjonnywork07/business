<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Register</title>

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
<div class="register-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
        <img src="{{ asset('/dist/img/AdminLTELogo.png') }}" alt="site Logo" class="brand-image elevation-3" style="opacity: .8" width="200px">
    </div>
    <div class="card-body">

      <form method="POST" action="{{ route('register') }}" >
        @csrf
        <div class="form-group mb-3">
          <input type="text" class="form-control" placeholder="Business Name" name="business_name" value="{{old('business_name')}}" required autofocus >
            @error('business_name') 
            <div>
              <span class="text-danger">{{ $message }}</span>
            </div>
            @enderror
        </div>
        {{-- <div class="form-group mb-3">
          <input type="text" class="form-control" placeholder="First Name" name="first_name" value="{{old('first_name')}}" required autofocus >
          @error('first_name') 
          <div>
            <span class="text-danger">{{ $message }}</span>
          </div>
          @enderror
        </div>
        <div class="form-group mb-3">
          <input type="text" class="form-control" placeholder="Middle Name" name="middle_name" value="{{old('middle_name')}}"  >
          @error('middle_name') 
          <div>
            <span class="text-danger">{{ $message }}</span>
          </div>
          @enderror
        </div>
        <div class="form-group mb-3">
          <input type="text" class="form-control" placeholder="Last Name" name="last_name" value="{{old('last_name')}}"  >
          @error('last_name') 
          <div>
            <span class="text-danger">{{ $message }}</span>
          </div>
          @enderror
        </div> --}}
        <div class="form-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="email" value="{{old('email')}}" required >
          @error('email')
          <div>
              <span class="text-danger">{{ $message }}</span>
          </div>
          @enderror
        </div>
        <div class="form-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password" required autocomplete="new-password">
          @error('password') 
          <div>
            <span class="text-danger">{{ $message }}</span>
          </div>
          @enderror
        </div>
        <div class="form-group mb-3">
          <input type="password" class="form-control" placeholder="Retype password" name="password_confirmation" required >
          @error('password_confirmation') 
          <div>
            <span class="text-danger">{{ $message }}</span>
          </div>
          @enderror
        </div>
        <div class="row">
          <div class="col-8">
            <a href="{{ route('login') }}" class="text-center">I already have an Account</a>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
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
</body>
</html>
