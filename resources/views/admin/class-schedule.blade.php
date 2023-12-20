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

        <div class="container">
            <a href="{{ route('create.class-schedule') }}" type="button" class="btn btn-primary"><i
                class="flaticon2-add-1"></i><strong> Tambah Jadwal Pelajaran Kelas</strong></a>
            
                @foreach ($studentClasses as $class)
                <div class="card card-custom my-5">
                    <div class="card-body">
                       <p class="h4"> Kelas  {{ $class->nama_kelas }} </p>

                       <a href="{{ route('edit.class-schedule', ['id' => $class->id]) }}"><i class="flaticon2-edit mr-3">Edit</i></a>

                       <table class="table">
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
                            {{-- <tbody>
                                @foreach($lessonHours as $lh)
                                <tr>
                                    <td>{{ $lh->waktu }}</td>
                                    @foreach ($days as $day) 
                                    <td>
                                        @foreach ($classSchedules as $schedule)
                                        <p>{{ $schedule->course ? $schedule->course->nama_mapel : '-' }}</p>
                                        @endforeach
                                    </td>
                                    @endforeach
                                </tr>
                                @endforeach
                            </tbody> --}}

                        </table>
                        
                    </div>
                </div>
                 @endforeach
        </div>
    </div>
    <!-- /.content -->
@endsection
