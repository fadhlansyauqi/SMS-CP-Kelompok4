@extends('layouts.app')

@section('content')
    <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <!--begin::Page Title-->
                    <h3 class="text-dark font-weight-bold my-1 mr-5"><b>Tambah Jadwal Pelajaran></h3>
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
                        <a href="" class="text-muted">Tambah Jadwal Pelajaran</a>
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

        <div class="card">
            <div class="card-body">
                <form action="{{ route('store.class-schedule') }}" method="POST">
                    @csrf
                    <table class="table">
                        <div>
                            <p class="h3 text-center mb-10">Kelas <select name="id_kelas" id="id_kelas">
                                    <option value="" disabled selected hidden>Pilih Kelas</option>
                                    @foreach ($classes as $class)
                                        <option value="{{ $class->id }}">{{ $class->nama_kelas }}</option>
                                    @endforeach
                                </select></p>
                        </div>
                        <thead>
                            <tr>
                                <th>Jam</th>
                                <th>Senin</th>
                                <th>Selasa</th>
                                <th>Rabu</th>
                                <th>Kamis</th>
                                <th>Jumat</th>
                                <th>Sabtu</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($lessonHours as $lh)
                                <tr>
                                    <td>{{ $lh->waktu }}</td>
                                    @foreach ($days as $day)
                                        <td>
                                            <input type="hidden" name="id_lesson_hours[]" value="{{ $lh->id }}">
                                            <input type="hidden" name="id_class[]" value="{{ $class->id }}">
                                            <input type="hidden" name="hari[]" value="{{ $day->hari }}">
                                            <select class="form-control" name="id_course[]">
                                                {{-- <option value="" disabled selected hidden>Pilih Mapel</option> --}}
                                                @foreach ($courses as $course)
                                                    <option value="{{ $course->id }}">{{ $course->nama_mapel }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                    <div class="text-right">
                        <a href="{{ route('admin.class-schedule') }}" class="btn btn-outline-danger mr-2"
                            role="button">Batal</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.content -->
@endsection
