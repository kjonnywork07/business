<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>

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
    @include('admin.layouts.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->

      @include('admin.layouts.sidebar')
      

  <!-- Content Wrapper. Contains page content -->
  
        @yield('content')
   
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.1.0
    </div>
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
<script src="{{asset('/dist/js/demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="{{asset('/dist/js/pages/dashboard3.js')}}"></script> -->
@yield('addonScripts')
<script>
  $(document).on('click','.btn-danger',function(){
    return confirm('Do you realy want to perform this action');
  });
  $(function(){
    // $('img').each(function(i,item){
    //   console.log($(item));
    //   $(item).css('display','none');
    // });
    // $(document).ready(function(){
      // $(document).on('error',"img",function () {
      //   alert('aa');
      //     // $(this).unbind("error").attr("src", "broken.gif");
      // });
    // });
  });
</script>
</body>
</html>
