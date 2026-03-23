@extends('back.layout.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">لوحة التحكم</h1>
                    </div><!-- /.col -->

                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">



            <div class="container-fluid ">
                <div class="row">
                    <!-- بوكس الأعمال -->
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ $work_count }}</h3>
                                <p>عدد الأعمال</p>
                            </div>
                            <div class="icon">
                                <!-- أيقونة العمل -->
                                <i class="ion ion-briefcase"></i>
                            </div>
                        </div>
                    </div>

                    <!-- بوكس الخدمات -->
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>8</h3>
                                <p>عدد الخدمات</p>
                            </div>
                            <div class="icon">
                                <!-- أيقونة الخدمات -->
                                <i class="ion ion-settings"></i>
                            </div>
                        </div>
                    </div>

                    <!-- بوكس العملاء -->
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>15</h3>
                                <p>عدد العملاء</p>
                            </div>
                            <div class="icon">
                                <!-- أيقونة العملاء -->
                                <i class="ion ion-person"></i>
                            </div>
                        </div>
                    </div>

                    <!-- بوكس المشاريع المكتملة -->
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>12</h3>
                                <p>المشاريع المكتملة</p>
                            </div>
                            <div class="icon">
                                <!-- أيقونة المشاريع -->
                                <i class="ion ion-checkmark"></i>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
