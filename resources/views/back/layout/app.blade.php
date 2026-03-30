<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
@include('back.layout.head')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">



        <!-- Navbar -->
       @include('back.layout.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('back.layout.Sidebar')
        <!-- Content Wrapper. Contains page content -->
       @yield('content')
        <!-- /.content-wrapper -->


        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
@include('back.layout.footer')
</body>

</html>
