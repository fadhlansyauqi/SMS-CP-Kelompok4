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
                    <form action="{{ route('update.grade', ['id' => $grade->id]) }}" method="post">
                        @csrf
                        <!--begin::Group-->
                        <div class="form-group">
                            <label for="id_nilai">ID Nilai</label>
                            <input type="text" name="id_nilai" id="id_nilai" class="form-control"
                                value="{{ $grade->id_nilai }}" required="required" placeholder="Masukkan Nama Mapel">
                        </div>
                        <!--end::Group-->
                        <!--begin::Group-->
                        <div class="form-group">
                            <label for="id_mapel">Mata Pelajaran</label>
                            <select class="form-control" name="id_mapel" id="id_mapel" required="required">
                                @foreach ($courses as $course)
                                    <option value="{{ $course->id }}"
                                        {{ $course->id == $grade->id_mapel ? 'selected' : '' }}>
                                        {{ $course->nama_mapel }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <!--end::Group-->
                        <!--begin::Group-->
                        <div class="form-group">
                            <label for="id_siswa">Siswa</label>
                            <select class="form-control" name="id_siswa" id="id_siswa" required="required">
                                @foreach ($students as $student)
                                    <option value="{{ $student->id }}"
                                        {{ $student->id == $grade->id_siswa ? 'selected' : '' }}>
                                        {{ $student->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <!--end::Group-->
                        <!--begin::Group-->
                        <div class="form-group">
                            <label for="jenis_nilai">Jenis Nilai</label>
                            <select class="form-control" name="jenis_nilai" id="jenis_nilai">
                                <option value="" {{ $grade->jenis_nilai === '' ? 'selected' : '' }}>Pilih Jenis
                                    Nilai...</option>
                                <option value="Quiz" {{ $grade->jenis_nilai === 'Quiz' ? 'selected' : '' }}>Quiz</option>
                                <option value="Uji Kompetensi"
                                    {{ $grade->jenis_nilai === 'Uji Kompetensi' ? 'selected' : '' }}>Uji Kompetensi
                                </option>
                                <option value="Ulangan Harian"
                                    {{ $grade->jenis_nilai === 'Ulangan Harian' ? 'selected' : '' }}>Ulangan Harian
                                </option>
                                <option value="UTS" {{ $grade->jenis_nilai === 'UTS' ? 'selected' : '' }}>UTS</option>
                                <option value="UAS" {{ $grade->jenis_nilai === 'UAS' ? 'selected' : '' }}>UAS</option>
                            </select>
                        </div>

                        <!--end::Group-->
                        <!--begin::Group-->
                        <div class="form-group">
                            <label for="nilai">Nilai Siswa</label>
                            <input type="text" name="nilai" id="nilai" class="form-control"
                                value="{{ $grade->nilai }}" required="required" placeholder="Masukkan Nama Mapel">
                        </div>
                        <!--end::Group-->
                        <div class="text-right">
                            <a href="teacher.student-grade" class="btn btn-outline-secondary mr-2" role="button">Batal</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>


        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
