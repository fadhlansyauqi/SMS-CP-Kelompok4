@extends('layouts.app')

@section('content')
    <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <!--begin::Page Title-->
                    <h3 class="text-dark font-weight-bold my-1 mr-5"><b>Dashboard Teacher</b></h3>
                    <!--end::Page Title-->

                </div>
                <!--end::Page Heading-->
            </div>
            <!--end::Info-->
            <!--begin::Toolbar-->
            <div class="d-flex align-items-center">
                <!--begin::Breadcrumb-->
                Dashboard
                <!--end::Breadcrumb-->
            </div>
            <!--end::Toolbar-->
        </div>
    </div>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">

                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">

                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">

            <!-- Grid of Cards -->
            <div class="row">

                <!-- Grade Card -->
                <div class="col-lg-3 col-md-6">
                    <a href="{{ route('teacher.student-grade-class') }}" class="text-decoration-none text-reset">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body">
                                <h5 class="card-title"><i class="fas fa-calendar-alt" style="color: #FFD700;"></i> Grade
                                </h5>
                                <!-- Add your Grade content here -->
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Attendance Card -->
                <div class="col-lg-3 col-md-6">
                    <a href="{{ route('teacher.student-attendance') }}" class="text-decoration-none text-reset">
                        <div class="card bg-success text-white mb-4">
                            <div class="card-body">
                                <h5 class="card-title"><i class="fas fa-graduation-cap" style="color: #00FF00;"></i>
                                    Attendance
                                </h5>
                                <!-- Add your Attendance content here -->
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Class Schedule Card -->
                <div class="col-lg-3 col-md-6">
                    <a href="{{ route('teacher.class-schedule') }}" class="text-decoration-none text-reset">
                        <div class="card bg-info text-white mb-4">
                            <div class="card-body">
                                <h5 class="card-title"><i class="fas fa-check-circle" style="color: #87CEEB;"></i>
                                    Class Schedule</h5>
                                <!-- Add your Class Schedule content here -->
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Student Class Card -->
                <div class="col-lg-3 col-md-6">
                    <a href="{{ route('teacher.student-class') }}" class="text-decoration-none text-reset">
                        <div class="card bg-danger text-white mb-4">
                            <div class="card-body">
                                <h5 class="card-title"><i class="menu-icon flaticon2-group" style="color: #FFD700;"></i>
                                    Class</h5>
                                <!-- Add your Student Class content here -->
                            </div>
                        </div>
                    </a>
                </div>

            </div>
            <!-- End Grid of Cards -->


        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
