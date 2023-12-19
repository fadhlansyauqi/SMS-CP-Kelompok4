@extends('layouts.app')

@section('content')
    <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <!--begin::Page Title-->
                    <h3 class="text-dark font-weight-bold my-1 mr-5"><b>Kelas Saya</b></h3>
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
                        <a href="{{ route('student.dashboard') }}" class="text-muted">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item text-muted">
                        <a href="" class="text-muted">Kelas Saya</a>
                    </li>
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Toolbar-->
        </div>
    </div>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body p-5">
                    <div class="container mt-4">
                    <h2>Informasi Siswa</h2>
                    <div class="row">
                        <div class="col-md-3">
                        <h5>Nama:</h5>
                        <p>John Doe</p>
                        </div>
                        <div class="col-md-3">
                        <h5>NIS:</h5>
                        <p>123456789</p>
                        </div>
                        <div class="col-md-3">
                        <h5>Kelas:</h5>
                        <p>XII-A</p>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-3">
                        <h5>Nama Orang Tua:</h5>
                        <p>Jane Doe</p>
                        </div>
                        <div class="col-md-3">
                        <h5>Tanggal Lahir:</h5>
                        <p>01 Januari 2000</p>
                        </div>
                        <div class="col-md-3">
                        <h5>Status:</h5>
                        <p>Aktif</p>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body p-0">
                    <table class="table table-hover table-bordered mb-0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kelas Belajar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tbl_classes as $index => $class)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $class->nama_kelas }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div><!-- /.container-fluid -->
        </div>
    </div>
    <!-- /.content -->
@endsection
