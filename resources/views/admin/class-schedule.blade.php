@extends('layouts.app')

@section('content')
    <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <!--begin::Page Title-->
                    <h3 class="text-dark font-weight-bold my-1 mr-5"><b>Jadwal Pelajaran</b></h3>
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
                        <a href="" class="text-muted">Jadwal Pelajaran</a>
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
                {{-- <div class="card-header text-right"> 
                    <a href="{{ route('create.course') }}" class="btn btn-primary" role="button">Tambah Jadwal Pelajaran</a> 
                </div> --}}

                <div class="card-body">
                    <table class="table mb-0 table-bordered">
                        <thead class="text-center bg-secondary">
                            <tr>
                                <td colspan="5">senin</td>
                            </tr>
                            <tr>
                                <td>Jam</td>
                                <td>Waktu</td>
                                <td>Kelas 7</td>
                                <td>Kelas 8</td>
                                <td>Kelas 9</td>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach ($courses as $course)
						    <tr>
                                <td class="text-center"> {{ $loop->index + 1 }}</td>
                                <td> {{ $course->kode_mapel }}</td> 
                                <td> {{ $course->nama_mapel }} </td> 
                                <td> {{ $course->teacher ?
                                    $course->teacher->nama : '-' }}</td> 
                                <td class="text-center"> 
                                    <a href="{{route('edit.course', ['id' => $course->id])}}" class="btn btn-warning btn-sm" role="button">Edit</a> 
                                    <a onclick="confirmDelete(this)" data-url="{{ route('delete.course', ['id' => $course->id]) }}" class="btn btn-danger btn-sm" role="button">Hapus</a>
                                </td>
                            @endforeach
                            </tr> --}}
                        </tbody>
                    </table>
                </div>
            </div>

        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
