<!DOCTYPE html>
<html lang="en">
@include('common.head')
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  @include('common.header')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('common.sidebar')

  <!-- Content Wrapper. Contains page content -->

  @yield('main_content')

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>

  <!-- /.content-wrapper -->
    @include('common.footer')
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
@include('common.jsfile')
<!-- jQuery -->

</body>
</html>
