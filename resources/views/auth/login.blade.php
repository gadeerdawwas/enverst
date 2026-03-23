<html lang="ar" dir="rtl">
<html>
<head>
@include('back.layout.head')
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b><img src="{{ asset('front/BLACK.png') }}" alt=""></b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
  <div class="login-logo">
    <a href="#"><b>تسجيل دخول</b></a>
  </div>
   <form method="POST" action="{{ route('login') }}">
        @csrf      
       <div class="input-group mb-3">
          <input type="email" class="form-control" name="email" placeholder="الايميل">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="كلمة المرور">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <div class="row">
          
          <!-- /.col -->
          <div class="col-6">


            <button type="submit" class="btn btn-primary btn-block btn-flat">تسجيل دخول</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>
