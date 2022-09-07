<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>CroLand - admin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Theme style -->
  <link href="{{ asset('css/adminlte.min.css') }}" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('css/fontawesome-all.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('css/OverlayScrollbars.min.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('css/summernote-bs4.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

@include('admin.includes.navbar')
@include('admin.includes.menu')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        @yield('core')
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>

<script
  src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js"
  integrity="sha256-eGE6blurk5sHj+rmkfsGYeKyZx3M4bG+ZlFyA7Kns7E="
  crossorigin="anonymous"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

<!-- Summernote -->
<script src="{{ asset('js/summernote-bs4.js') }}"></script>
<script>
    $(function () {
        // Summernote
        $('.textarea').summernote()
    })
</script>

<script>
  $(document).ready(function(){
  $("ul").addClass("ul-checkmark");
});
</script>
<!-- overlayScrollbars -->
<script src="{{ asset('js/jquery.overlayScrollbars.min.js') }}"></script>

<!-- AdminLTE App -->
<script type="text/javascript" src="{{ asset('js/adminlte.min.js') }}"></script>
</body>
</html>
