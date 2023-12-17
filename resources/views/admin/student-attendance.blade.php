@extends('layouts.app')

@section('content')
    <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <!--begin::Page Title-->
                    <h3 class="text-dark font-weight-bold my-1 mr-5"><b>Absen Siswa</b></h3>
                    <!--end::Page Title-->

                </div>
                <!--end::Page Heading-->
            </div>
            <!--end::Info-->
            <!--begin::Toolbar-->
            <div class="d-flex align-items-center">
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                    <li class="breadcrumb-item text-muted">
                        <a href="{{ route('admin.dashboard') }}" class="text-muted">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item text-muted">
                        <a href="" class="text-muted">Absen Siswa</a>
                    </li>
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Toolbar-->
        </div>
    </div>

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="col-lg-6 col-xxl-4 mx-auto">
                <div class="card card-custom card-stretch gutter-b">
                    <!--begin::Header-->
                    <div class="card-header text-center align-items-center border-0 mt-4">
                        <h3 class="card-title align-items-center flex-column">
                            <span class="font-weight-bolder text-dark text-center">Silahkan Pilih Kelas</span>
                        </h3>
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body pt-4">
                        <!--begin::Row-->
                        <div class="row m-0 text-center">
                            <div class="col bg-light-warning px-6 py-8 rounded-xl mb-7">
                                <i class="la la-users text-warning icon-3x mb-2"></i>
                                <br>
                                <a href="#" class="text-warning font-weight-bold font-size-h6">Kelas 9</a>
                            </div>
                        </div>
                        <!--end::Row-->
                        <!--begin::Row-->
                        <div class="row m-0 text-center">
                            <div class="col bg-light-danger px-6 py-8 rounded-xl mr-7">
                                <i class="la la-user text-danger icon-3x mb-2"></i>
                                <br>
                                <a href="#" class="text-danger font-weight-bold font-size-h6 mt-2">Kelas 7</a>
                            </div>
                            <div class="col bg-light-success px-6 py-8 rounded-xl">
                                <i class="la la-user-friends text-success icon-3x mb-2"></i>
                                <br>
                                <a href="#" class="text-success font-weight-bold font-size-h6 mt-2">Kelas 8</a>
                            </div>
                        </div>
                        <!--end::Row-->
                    </div>
                    <!--end: Card Body-->
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
