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
                        <div class="form-group">
                            <label for="id_absen">ID Absen</label>
                            <input type="text" name="id_absen" id="id_absen" class="form-control" required="required"
                                placeholder="Masukkan Nama Mapel">
                        </div>
                        <!--end::Group-->
                        <!--begin::Group-->
                        <div class="form-group">
                            <label for="id_student">Nama Siswa</label>
                            <select class="form-control" name="id_student" id="id_student" required="required">
                                @foreach ($students as $student)
                                    <option value="{{ $student->id }}">{{ $student->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!--end::Group-->
                        <!--begin::Group-->
                        <div class="form-group">
                            <label for="materi">Nama Pembelajaran</label>
                            <input type="text" name="materi" id="materi" class="form-control" required="required"
                                placeholder="Masukkan Nama Mapel">
                        </div>
                        <!--end::Group-->
                        <!--begin::Group-->
                        <div class="form-group">
                            <label for="jenis_nilai">Pertemuan</label>
                            <select id="jadwal" class="form-control" name="pertemuan">
                                <option value="">Pertemuan Ke-</option>
                                <option value="Minggu 1">Minggu 1</option>
                                <option value="Minggu 2">Minggu 2</option>
                                <option value="Minggu 3">Minggu 3</option>
                                <option value="Minggu 4">Minggu 4</option>
                                <option value="Minggu 5">Minggu 5</option>
                                <option value="Minggu 6">Minggu 6</option>
                                <option value="Minggu 7">Minggu 7</option>
                                <option value="Minggu 8">Minggu 8</option>
                                <option value="Minggu 9">Minggu 9</option>
                                <option value="Minggu 10">Minggu 10</option>
                                <option value="Minggu 11">Minggu 11</option>
                                <option value="Minggu 12">Minggu 12</option>
                                <option value="Minggu 13">Minggu 13</option>
                                <option value="Minggu 14">Minggu 14</option>
                            </select>
                        </div>
                        <!--end::Group-->
                        <!--begin::Group-->
                        <div class="form-group">
                            <label for="tgl">tgl Siswa</label>
                            <input type="date" name="tgl" id="tgl" class="form-control" required="required"
                                placeholder="Masukkan Nama Mapel">
                        </div>
                        <!--end::Group-->
                        <!--begin::Group-->
                        <div class="form-group">
                            <label for="ket">Keterangan: </label><br>
                            <input type="radio" id="Alpa" name="ket" value="Alpa">
                            <label for="Alpa">Alpa</label><br>
                            <input type="radio" id="Izin" name="ket" value="Izin">
                            <label for="Izin">Izin</label><br>
                            <input type="radio" id="Sakit" name="ket" value="Sakit">
                            <label for="Sakit">Sakit</label><br>
                            <input type="radio" id="Terlambat" name="ket" value="Terlambat">
                            <label for="Terlambat">Terlambat</label><br>
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
