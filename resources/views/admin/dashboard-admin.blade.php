@extends('layouts.app')

@section('content')
    <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <!--begin::Page Title-->
                    <h3 class="text-dark font-weight-bold my-1 mr-5"><b>Dashboard Admin</b></h3>
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

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row justify">
                <div class="col-12">
                    <!--begin::Mixed Widget 1-->
                            <div class="card card-custom bg-gray-100 card-stretch gutter-b">
                                <!--begin::Header-->
                                <div class="card-header border-0 bg-primary text-center py-5">
                                    <h3 class="card-title font-weight-bolder text-white text-center">Database E-School</h3>
                                </div>
                                <!--end::Header-->
                                <!--begin::Body-->
                                <div class="card-body p-0 position-relative overflow-hidden">
                                    <!--begin::Chart-->
                                    <div id="kt_mixed_widget_1_chart" class="card-rounded-bottom bg-primary"
                                        style="height: 100px">
                                    </div>
                                    <!--end::Chart-->
                                    <!--begin::Stats-->
                                    <div class="card-spacer mt-n30 mb-15">">
                                        <!--begin::Row-->
                                        <div class="row m-0 text-center">
                                            <div class="col-1 ml-n13"></div>
                                            <div class="col-2 bg-light-warning px-6 py-8 rounded-xl mr-5">
                                                <p class="text-warning font-weight-bold font-size-h1" >{{ $totalStudents }}</p>
                                                <a href="#" class="text-warning font-weight-bold font-size-h6">Jumlah Siswa
                                                </a>
                                                <p class="text-warning font-weight-bold font-size-h7 mt-2">Laki laki: {{ $maleStudents }} orang <br>
                                                    Perempuan: {{ $femaleStudents }} orang 
                                                </p>
                                            </div>
                                            <div class="col-2 bg-light-primary px-6 py-8 rounded-xl mr-5">
                                                <p class="text-primary font-weight-bold font-size-h1" >{{ $totalClasses }}</p>
                                                <a href="#"
                                                    class="text-primary font-weight-bold font-size-h6 mt-2">Kelas Siswa</a>
                                            </div>

                                            <div class="col-2 bg-light-danger px-6 py-8 rounded-xl mr-7">
                                                <p class="text-danger font-weight-bold font-size-h1" >{{ $totalTeachers }}</p>
                                                </span>
                                                <a href="#"
                                                    class="text-danger font-weight-bold font-size-h6 mt-2">Guru Pengajar</a>
                                            </div>
                                            <div class="col-2 bg-light-success px-6 py-8 rounded-xl mr-5">
                                                <p class="text-success font-weight-bold font-size-h1" >{{ $totalCourses }}</p>
                                                </span>
                                                <a href="#"
                                                    class="text-success font-weight-bold font-size-h6 mt-2">Mata Pelajaran</a>
                                            </div>

                                            <div class="col-2 bg-light-info px-6 py-8 rounded-xl">
                                                    <p class="text-info font-weight-bold font-size-h1" >{{ $totalUsers }}</p>
                                                <a href="#"
                                                    class="text-info font-weight-bold font-size-h6 mt-2">Akun Terdaftar</a>
                                                    <p class="text-info font-weight-bold font-size-h7 mt-2">Admin: {{ $adminUsers }} akun <br>
                                                        Teacher: {{ $teacherUsers }} akun <br>
                                                        Student: {{ $studentUsers }} akun
                                                    </p>
                                            </div>
                                        </div>
                                        <!--end::Row-->
                                    </div>
                                    <!--end::Stats-->
                                </div>
                                <!--end::Body-->
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Mixed Widget 1-->
            </div>
        </div>
    </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
