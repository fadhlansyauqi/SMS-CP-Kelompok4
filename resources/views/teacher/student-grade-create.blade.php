@extends('layouts.app')

@section('content')
    <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <!--begin::Page Title-->
                    <h3 class="text-dark font-weight-bold my-1 mr-5"><b>Nilai Siswa</b></h3>
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
                        <a href="" class="text-muted">Nilai Siswa</a>
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
                    <form action="{{ route('teacher.store-student-grade') }}" method="post">
                        @csrf
                        <!--begin::Group-->
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Nama Mata Pelajaran</label>
                            <div class="col-lg-9 col-xl-9">
                                <input class="form-control form-control-solid form-control-lg" name="id_mapel"
                                    type="text" value="" />
                            </div>
                        </div>
                        <!--end::Group-->
                        <!--begin::Group-->
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Nama Siswa</label>
                            <div class="col-lg-9 col-xl-9">
                                <input class="form-control form-control-solid form-control-lg" name="nis" type="text"
                                    value="" />
                            </div>
                        </div>
                        <!--end::Group-->
                        <!--begin::Group-->
                        <div class="form-group row">
                            <label class="col-form-label col-xl-3 col-lg-3">Jenis Nilai</label>
                            <div class="col-xl-9 col-lg-9">
                                <select class="form-control form-control-lg form-control-solid" name="jenis_nilai">
                                    <option value="">Pilih Jenis Nilai...</option>
                                    <option value="id">Quiz</option>
                                    <option value="msa">Bahasa Melayu - Malay</option>
                                    <option value="ca">Català - Catalan</option>
                                    <option value="cs">Čeština - Czech</option>
                                    <option value="da">Dansk - Danish</option>
                                    <option value="de">Deutsch - German</option>
                                </select>
                            </div>
                        </div>
                        <!--end::Group-->
                        <!--begin::Group-->
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Nilai Siswa</label>
                            <div class="col-lg-9 col-xl-9">
                                <input class="form-control form-control-solid form-control-lg" name="nilai" type="text"
                                    value="" />
                            </div>
                        </div>
                        <!--end::Group-->
                        <div class="text-right">
                            <a href="#" class="btn btn-outline-secondary mr-2" role="button">Batal</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>


        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
