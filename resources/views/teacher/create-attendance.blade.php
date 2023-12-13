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
                        <a href="{{ route('teacher.dashboard') }}" class="text-muted">Dashboard</a>
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
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">

                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('store.attendance') }}" method="post">
                        @csrf
                        <!--begin::Group-->
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Nama Siswa</label>
                            <div class="col-lg-9 col-xl-9">
                                <select class="form-control form-control-solid form-control-lg" name="nis"
                                    id="nis" required="required">
                                    @foreach ($students as $student)
                                        <option value="{{ $student->nis }}">{{ $student->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!--end::Group-->
                        <!--begin::Group-->
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Nama Pembelajaran</label>
                            <div class="col-lg-9 col-xl-9">
                                <input class="form-control form-control-solid form-control-lg" name="nama" type="text"
                                    value="" />
                            </div>
                        </div>
                        <!--end::Group-->
                        <!--begin::Group-->
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label" for="jadwal">Pertemuan Ke -</label>
                            <div class="col-lg-9 col-xl-9">
                                <select id="jadwal" class="form-control" name="pertemuan">
                                    <option selected>Minggu 1</option>
                                    <option>Minggu 2</option>
                                    <option>Minggu 3</option>
                                    <option>Minggu 4</option>
                                    <option>Minggu 5</option>
                                    <option>Minggu 6</option>
                                    <option>Minggu 7</option>
                                    <option>Minggu 8</option>
                                    <option>Minggu 9</option>
                                    <option>Minggu 10</option>
                                    <option>Minggu 11</option>
                                    <option>Minggu 12</option>
                                    <option>Minggu 13</option>
                                    <option>Minggu 14</option>
                                </select>
                            </div>
                        </div>
                        <!--end::Group-->
                        <!--begin::Group-->
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Tanggal</label>
                            <div class="col-lg-9 col-xl-9">
                                <input class="form-control form-control-solid form-control-lg" name="tgl" type="date"
                                    value="" />
                            </div>
                        </div>
                        <!--end::Group-->
                        <!--begin::Group-->
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Keterangan</label>
                            <div class="col-lg-9 col-xl-9">
                                <input class="form-control form-control-solid form-control-lg" name="ket" type="text"
                                    value="" />
                            </div>
                        </div>
                        <!--end::Group-->
                        <div class="text-right">
                            <a href="{{ route('teacher.student-attendance') }}" class="btn btn-outline-secondary mr-2"
                                role="button">Batal</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>


        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
