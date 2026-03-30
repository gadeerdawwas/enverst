<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->


    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 d-flex">
            {{--  <div class="image">  --}}
                <a href="{{ route('dashboard') }}">
                {{--  <img src="{{ asset('front/black.png') }}" class="img-circle elevation-2" alt="User Image">  --}}
               <img src="{{ asset('front/logo1.png') }}" class="img-circle elevation-2" alt="User Image">

                </a>
            {{--  </div>  --}}

        </div>



        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">



                <li class="nav-item">
                    <a href="#" class="nav-link">
                        {{--  <i class="nav-icon fas fa-copy"></i>  --}}
                        <p>
                            معرض الأعمال
                            <i class="fas fa-angle-left right"></i>

                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: none;">
                        <li class="nav-item">
                            <a href="{{ route('works.create') }}" class="nav-link">
                                <p>اضافة عمل </p>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="{{ route('works.index') }}" class="nav-link">
                                <p>عرض الأعمال </p>
                            </a>
                        </li>
                    </ul>
                </li>



            </ul>
        </nav>
    </div>

</aside>
