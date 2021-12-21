<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>
	<meta name="description" content="@yield('desc')" />
	
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="icon" type="image/png" href="{{asset('dist/img/fav.png')}}"/>
  <!-- Theme style -->

  <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
  @yield('addonStyle')
  <style>
    .header-navigation li.nav-item,.header-navigation li.nav-item a {
    color: #067dc3 !important;
    }
    .header-navigation li.nav-item.active, .header-navigation li.nav-item.active a {
    color: #007bff !important;
    border-bottom: 1px solid;
    }
    i.fas.fa-star-half-alt {
    color: #007bff;
    }
    div#main-header-search {
    max-width: 400px;
    margin: auto;
}
  </style>
</head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
    {{-- @include('admin.layouts.navbar') --}}
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->

      {{-- @include('admin.layouts.sidebar') --}}
      

  <!-- Content Wrapper. Contains page content -->
  <section class="header">
    <div class="container-fluid">
      <div class="row">
        <!-- navigation -->
        <nav class="navbar navbar-expand navbar-light" style="width: 100%;">
          <!-- Left navbar links -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link"  href="/" role="button">
                <img src="{{ asset('/dist/img/AdminLTELogo.png') }}"  height="20px">
              </a>
            </li>
          </ul>

          <!-- Right navbar links -->
          <ul class="navbar-nav ml-auto header-navigation">
            <!-- Navbar Search -->
            <li class="nav-item">
              <a class="nav-link" data-widget="navbar-search" data-target="#main-header-search" href="#" role="button">
                <i class="fas fa-search"></i>
              </a>
              <div class="navbar-search-block" id="main-header-search">
                <form class="form-inline"  action="" method="GET">
                  <div class="input-group input-group-sm">
                    <select name="role" id="role" class="custom-select" style="max-width: 120px;">
                      <option value="0" {{isset($searchRole) && $searchRole==0?'selected':''}}>Company</option>
                      <option value="1" {{isset($searchRole) && $searchRole==1?'selected':''}} >Employee</option>
                    </select>
                    <input class="form-control form-control-navbar" name="search" value="{{$search??''}}" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                      <button class="btn btn-navbar" type="submit">
                        <i class="fas fa-search"></i>
                      </button>
                      <button class="btn btn-navbar" type="submit" data-widget="navbar-search">
                        <i class="fas fa-times"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>
            <li class="nav-item d-none d-sm-inline-block {{-- {{ Route::is('home')?"active":''}} --}}">
              <a href="{{--{{route('home')}} --}}" class="nav-link">Home</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block {{-- Route::is('team-leads')?"active":''--}}">
              <a href="{{--route('team-leads')--}}" class="nav-link">Companies</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block {{-- Route::is('employes')?"active":''--}}">
              <a href="{{--route('employes')--}}" class="nav-link">Employs</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block {{-- Route::is('front-blogs')?"active":''--}}">
              <a href="{{--route('front-blogs')--}}" class="nav-link">Blogs</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block {{-- Route::is('my-profile')?"active":''--}}">
              @if (!Auth::guest())
                <a href="{{--route('my-profile')--}}" class="nav-link">profile</a>
              @endif
            </li>
            <li class="nav-item d-none d-sm-inline-block">
              @if (!Auth::guest())
                <form action="{{route('logout')}}" method="post">
                  @csrf
                  <button class=" btn btn-link" role="button" style="color: #067dc3;">Logout</button>
                </form>
              @else
                <a href="{{route('login')}}" class="nav-link">Login</a>
              @endif
            </li>
            <li class="nav-item d-none d-sm-inline-block">
              @if (Auth::guest())
                <a href="{{route('register')}}" class="nav-link">SignUp</a>
              @endif
            </li>
          </ul>
        </nav>
        <!-- /.navigation -->
      </div>
      
      <!-- /.row -->
    </div>
  </section>
        @yield('content')
   
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer" style="margin: 0px !important;">
    <strong>Copyright &copy; {{date('Y')}} 
    All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{asset('/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE -->
<script src="{{asset('/dist/js/adminlte.js')}}"></script>

<!-- OPTIONAL SCRIPTS -->
<!-- <script src="{{asset('/plugins/chart.js/Chart.min.js')}}"></script> -->
<!-- AdminLTE for demo purposes -->
{{-- <script src="{{asset('/dist/js/demo.js')}}"></script> --}}
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{{-- <!-- <script src="{{asset('/dist/js/pages/dashboard3.js')}}"></script> --> --}}
@yield('addonScripts')
</body>
</html>
