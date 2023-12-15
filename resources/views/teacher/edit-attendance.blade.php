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
                    <form action="{{ route('update.attendance', ['id' => $attendance->id]) }}" method="post">
                        @csrf
                        <!--begin::Group-->
                        <div class="form-group">
                            <label for="id_absen">ID Absen</label>
                            <input type="text" name="id_absen" id="id_absen" class="form-control"
                                value="{{ $attendance->id_absen }}" required="required" placeholder="Masukkan Nama Mapel">
                        </div>
                        <!--end::Group-->
                        <!--begin::Group-->
                        <div class="form-group">
                            <label for="id_student">Nama Siswa</label>
                            <select class="form-control" name="id_student" id="id_student" required="required">
                                @foreach ($students as $student)
                                    <option value="{{ $student->id }}"
                                        {{ $student->id == $attendance->id_student ? 'selected' : '' }}>
                                        {{ $student->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <!--end::Group-->
                        <!--begin::Group-->
                        <div class="form-group">
                            <label for="materi">Nama Pembelajaran</label>
                            <input type="text" name="materi" id="materi" class="form-control"
                                value="{{ $attendance->materi }}" required="required" placeholder="Masukkan Nama Mapel">
                        </div>
                        <!--end::Group-->
                        <!--begin::Group-->
                        <div class="form-group">
                            <label for="jenis_nilai">Pertemuan</label>
                            <select id="jadwal" class="form-control" name="pertemuan">
                                <option value="Minggu 1" {{ $attendance->pertemuan === 'Minggu 1' ? 'selected' : '' }}>
                                    Minggu 1</option>
                                <option value="Minggu 2" {{ $attendance->pertemuan === 'Minggu 2' ? 'selected' : '' }}>
                                    Minggu 2</option>
                                <option value="Minggu 3" {{ $attendance->pertemuan === 'Minggu 3' ? 'selected' : '' }}>
                                    Minggu 3</option>
                                <option value="Minggu 4" {{ $attendance->pertemuan === 'Minggu 4' ? 'selected' : '' }}>
                                    Minggu 4</option>
                                <option value="Minggu 5" {{ $attendance->pertemuan === 'Minggu 5' ? 'selected' : '' }}>
                                    Minggu 5</option>
                                <option value="Minggu 6" {{ $attendance->pertemuan === 'Minggu 6' ? 'selected' : '' }}>
                                    Minggu 6</option>
                                <option value="Minggu 7" {{ $attendance->pertemuan === 'Minggu 7' ? 'selected' : '' }}>
                                    Minggu 7</option>
                                <option value="Minggu 8" {{ $attendance->pertemuan === 'Minggu 8' ? 'selected' : '' }}>
                                    Minggu 8</option>
                                <option value="Minggu 9" {{ $attendance->pertemuan === 'Minggu 9' ? 'selected' : '' }}>
                                    Minggu 9</option>
                                <option value="Minggu 10"{{ $attendance->pertemuan === 'Minggu 10' ? 'selected' : '' }}>
                                    Minggu 10</option>
                                <option value="Minggu 11"{{ $attendance->pertemuan === 'Minggu 11' ? 'selected' : '' }}>
                                    Minggu 11</option>
                                <option value="Minggu 12"{{ $attendance->pertemuan === 'Minggu 12' ? 'selected' : '' }}>
                                    Minggu 12</option>
                                <option value="Minggu 13"{{ $attendance->pertemuan === 'Minggu 13' ? 'selected' : '' }}>
                                    Minggu 13</option>
                                <option value="Minggu 14"{{ $attendance->pertemuan === 'Minggu 14' ? 'selected' : '' }}>
                                    Minggu 14</option>
                            </select>
                        </div>
                        <!--end::Group-->
                        <!--begin::Group-->
                        <div class="form-group">
                            <label for="tgl">tgl Siswa</label>
                            <input type="date" name="tgl" id="tgl" class="form-control"
                                value="{{ $attendance->tgl }}" required="required" placeholder="Masukkan Nama Mapel">
                        </div>
                        <!--end::Group-->
                        <!--begin::Group-->
                        <div class="form-group">
                            <label for="ket">Keterangan: </label><br>
                            <input type="radio" id="Alpa" name="ket" value="Alpa"
                                {{ $attendance->ket === 'Alpa' ? 'checked' : '' }}>
                            <label for="Alpa">Alpa</label><br>
                            <input type="radio" id="Izin" name="ket" value="Izin"
                                {{ $attendance->ket === 'Izin' ? 'checked' : '' }}>
                            <label for="Izin">Izin</label><br>
                            <input type="radio" id="Sakit" name="ket" value="Sakit"
                                {{ $attendance->ket === 'Sakit' ? 'checked' : '' }}>
                            <label for="Sakit">Sakit</label><br>
                            <input type="radio" id="Terlambat" name="ket" value="Terlambat"
                                {{ $attendance->ket === 'Terlambat' ? 'checked' : '' }}>
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
