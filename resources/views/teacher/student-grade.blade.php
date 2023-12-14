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
                <div class="card-header text-right">
                    <a href='{{ route('create.grade') }}' class="btn btn-primary" role="button">Tambah
                        Nilai</a>
                </div>
                <div class="card">
                    <div class="card-body">
                        <table class="table mb-0 table-bordered">
                            <thead class="text-center bg-secondary">
                                <tr>
                                    <td>No.</td>
                                    <td>ID Nilai</td>
                                    <td>Nama Mapel</td>
                                    <td>Nama Siswa</td>
                                    <td>Jenis Nilai</td>
                                    <td>Nilai</td>
                                    <td style="width: 15%">Aksi</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($grades as $grade)
                                    <tr>
                                        <td> {{ $loop->index + 1 }} </td>
                                        <td> {{ $grade->id_nilai }} </td>
                                        <td> {{ $grade->course ? $grade->course->nama_mapel : '-' }}</td>
                                        <td> {{ $grade->student ? $grade->student->nama : '-' }}</td>
                                        <td> {{ $grade->jenis_nilai }} </td>
                                        <td> {{ $grade->nilai }} </td>
                                        <td class="text-center">
                                            <a href="{{ route('edit.grade', ['id' => $grade->id]) }}"
                                                class="btn btn-warning btn-sm" role="button">Edit</a>
                                            <a href="{{ route('delete.grade', ['id' => $grade->id]) }}"
                                                class="btn btn-danger btn-sm" role="button">Hapus</a>
                                        </td>
                                @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    @endsection
