@extends('layouts.app')

@section('content')
    <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <!--begin::Page Title-->
                    <h3 class="text-dark font-weight-bold my-1 mr-5"><b>Tambah Kelas</b></h3>
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
                        <a href="{{ route('admin.student-class') }}" class="text-muted">Daftar Kelas Siswa</a>
                    </li>
                    <li class="breadcrumb-item text-muted">
                        <a href="" class="text-muted">Tambah Kelas</a>
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

            <div class="card">

                <div class="card-body">
                    <a href="{{ route('admin.student-class') }}">
                        <i class="flaticon2-back icon-xm text-primary"> Kembali</i>
                    </a>
                    <h3 class="text-dark font-weight-bold mt-5 "><b>Tambah Kelas Baru</b></h3>

                    <form action="{{ route('admin.student-class.store') }}" method="post">
                        @csrf

                        <div class="form-group mt-5">
                            <label for=""><strong>Nama Kelas</strong></label>
                            <input type="text" name="nama_kelas" id="nama_kelas" class="form-control"
                                placeholder="Masukkan Nama Kelas">
                            @error('nama_kelas')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="text-right">
                            <a href="{{ route('admin.student-class') }}" class="btn btn-outline-danger mr-2"
                                role="button">Batal</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>

                </div>
            </div>

        </div><!-- /.container-fluid -->
    </div>
    <!--end::content-->
@endsection
