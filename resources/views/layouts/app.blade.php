<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{{ URL::asset('resources/assets/sass/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ URL::asset('resources/assets/sass/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- font -->
   <link rel="stylesheet" href="{{ URL::asset('resources/assets/sass/fonts.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ URL::asset('resources/assets/sass/site.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ URL::asset('resources/assets/changeskin/skins/_all-skins.min.css')}}">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{ URL::asset('resources/assets/plugins/datepicker/datepicker3.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ URL::asset('resources/assets/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- jQuery 2.2.3 -->
  <script src="{{ URL::asset('resources/assets/js/jquery-2.2.3.min.js')}}"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="{{ URL::asset('resources/assets/js/jquery-ui.min.js')}}"></script>
  <!-- Bootstrap 3.3.6 -->
  <script src="{{ URL::asset('resources/assets/js/bootstrap.min.js')}}"></script>
  <script>
    window.Laravel = <?php echo json_encode([
      'csrfToken' => csrf_token(),
    ]); ?>
  </script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <!-- header -->
    @include('layouts/header')
    <!-- endheader -->
    <!-- wrapper -->
    @section('sidebar')
    @show
    <!-- Content Wrapper. Contains page content -->
    <main class="content-wrapper">
      <section class="content-header">
        <h1>
          @yield('h1')
          <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">@yield('request')</li>
        </ol>
      </section>

    @yield('content')
    </main>
    <!-- /.content-wrapper -->
    <!-- footer -->
    @include('layouts/footer')
    <!-- endfooter -->
    <!-- Control Sidebar -->
    @include('layouts/control')
</div>
<!-- ./wrapper -->
<!-- site -->
<script src="{{ URL::asset('resources/assets/js/site.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ URL::asset('resources/assets/changeskin/changeskin.js')}}"></script>
</body>
</html>