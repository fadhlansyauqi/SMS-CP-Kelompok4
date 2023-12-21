@extends('layouts.app')

@section('content')
    <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
        <!-- ... (Your existing code) ... -->
    </div>

    <div class="content-header">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <h1>Dashboard</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">

            <!-- Grid of Cards -->
            <div class="row">

                <!-- Schedule Card -->
                <div class="col-lg-3 col-md-6">
                    <a href="{{ route('student.class-schedule') }}" class="text-decoration-none text-reset">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body">
                                <h5 class="card-title"><i class="fas fa-calendar-alt" style="color: #FFD700;"></i> Schedule</h5>
                                <!-- Add your schedule content here -->
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Grades Card -->
                <div class="col-lg-3 col-md-6">
                    <a href="{{ route('student.grade') }}" class="text-decoration-none text-reset">
                        <div class="card bg-success text-white mb-4">
                            <div class="card-body">
                                <h5 class="card-title"><i class="fas fa-graduation-cap" style="color: #00FF00;"></i> Grades</h5>
                                <!-- Add your grades content here -->
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Attendance Card -->
                <div class="col-lg-3 col-md-6">
                    <a href="{{ route('student.attendance') }}" class="text-decoration-none text-reset">
                        <div class="card bg-info text-white mb-4">
                            <div class="card-body">
                                <h5 class="card-title"><i class="fas fa-check-circle" style="color: #87CEEB;"></i> Attendance</h5>
                                <!-- Add your attendance content here -->
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Class Card -->
                <div class="col-lg-3 col-md-6">
                    <a href="{{ route('student.class') }}" class="text-decoration-none text-reset">
                        <div class="card bg-danger text-white mb-4">
                            <div class="card-body">
                                <h5 class="card-title"><i class="menu-icon flaticon2-group" style="color: #FFD700;"></i> Class</h5>
                                <!-- Add your attendance content here -->
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Payment Card -->
                <div class="col-lg-3 col-md-6">
                    <a href="{{ route('student.tuition-payment') }}" class="text-decoration-none text-reset">
                        <div class="card bg-warning text-white mb-4">
                            <div class="card-body">
                                <h5 class="card-title"><i class="fas fa-money-bill" style="color: #00FF00;"></i> Payment</h5>
                                <!-- Add your payment content here -->
                            </div>
                        </div>
                    </a>
                </div>

            </div>
            <!-- End Grid of Cards -->

        </div><!-- /.container-fluid -->
    </div><!-- /.content -->
@endsection
