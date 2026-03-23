   <header class="nav-wrap">
        <nav class="container nav-inner">
            <!-- Brand (right) -->
            <a class="brand" href="{{ route('home') }}">
                <img src="{{ asset('front/logo1.png') }}" alt="">

            </a>

            <!-- Links (center) -->
            <ul class="nav nav-links d-none d-lg-flex">
                <li class="nav-item"><a class="nav-link nav-a {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">الرئيسية</a></li>
                <li class="nav-item"><a class="nav-link nav-a {{ request()->routeIs('services') ? 'active' : '' }}" href="{{ route('services') }}">خدماتنا</a></li>
                <li class="nav-item"><a class="nav-link nav-a {{ request()->routeIs('portfolio') ? 'active' : '' }}" href="{{ route('portfolio') }}">أعمالنا</a></li>
                {{--  <li class="nav-item"><a class="nav-link nav-a {{ request()->routeIs('portfolio') ? 'active' : '' }}" href="{{ route('portfolio') }}">الباقات و العروض</a></li>  --}}
                <li class="nav-item"><a class="nav-link nav-a {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">من نحن</a></li>
                <li class="nav-item"><a class="nav-link nav-a {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">تواصل معنا</a></li>
            </ul>

            <!-- CTA (left) -->
            <div class="d-flex align-items-center gap-2">
                {{--  <a class="btn btn-cta d-none d-md-inline-flex" href="#">
                    <i class="bi bi-telephone-fill"></i> احجز استشارة مجانية
                </a>  --}}

                <button class="btn btn-menu d-inline-flex d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileMenu" aria-controls="mobileMenu">
          <i class="fa-solid fa-bars "></i>
        </button>
            </div>
        </nav>
    </header>
  <!-- Mobile Menu -->
    <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="mobileMenu" aria-labelledby="mobileMenuLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="mobileMenuLabel">القائمة</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="d-grid gap-2">
                <a class="btn btn-outline-gold" href="{{ route('home') }}" data-bs-dismiss="offcanvas">الرئيسية</a>
                <a class="btn btn-outline-gold" href="{{ route('services') }}" data-bs-dismiss="offcanvas">خدماتنا</a>
                <a class="btn btn-outline-gold" href="{{ route('portfolio') }}" data-bs-dismiss="offcanvas">أعمالنا</a>
                {{--  <a class="btn btn-outline-gold" href="" data-bs-dismiss="offcanvas">الباقات و العروض</a>  --}}
                <a class="btn btn-outline-gold" href="{{ route('contact') }}" data-bs-dismiss="offcanvas">من نحن</a>
                <a class="btn btn-outline-gold" href="{{ route('about') }}" data-bs-dismiss="offcanvas">تواصل معنا</a>
                {{--  <a class="btn btn-cta mt-2" href="#" data-bs-dismiss="offcanvas">
                    <i class="bi bi-telephone-fill"></i> احجز استشارة مجانية
                </a>  --}}
            </div>
        </div>
    </div>
