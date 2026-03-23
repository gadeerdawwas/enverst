<!doctype html>
<html lang="ar" dir="rtl">

<head>
    @include('front.layout.head')

</head>

<body>
    <!-- Background glow/vignette like screenshot -->
    <div class="bg-effects" aria-hidden="true"></div>

    <!-- NAVBAR -->
    @include('front.layout.header')


    @yield('content')





    <!-- FOOTER -->
    @include('front.layout.footer')


</body>

</html>
