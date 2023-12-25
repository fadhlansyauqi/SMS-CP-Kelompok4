@extends('layouts.app')
<style>
    
.table{
  text-align: center;
  vertical-align: middle;
  padding: 0;
}
p{
  height: 36px;
  font-size: 12px;
  margin: 0;
  
}
.abu{
  background-color: rgb(234, 234, 234);
  height: 36px;
  border-radius: 3px;

}
.hari{
  
  border: none;
}
.jam{
  
  height: 50px;
  width: 80px;
}


  </style>
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
                        <a href="{{ route('student.dashboard') }}" class="text-muted">Dashboard</a>
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
            
            @foreach ($studentClasses as $class)
            <div class="card mb-13">
                <div class="card-body">
                    <p class="h3 text-center">Kelas {{ $class->nama_kelas }} </p>
                        
        
                    <table class="table">
                        <thead class="text-center">
                            <tr>
                                <th style="width: 9%">Jam</th>
                                <th style="width: 16%">Senin</th>
                                <th style="width: 15%">Selasa</th>
                                <th style="width: 15%">Rabu</th>
                                <th style="width: 15%">Kamis</th>
                                <th style="width: 15%">Jumat</th>
                                <th style="width: 16%">Sabtu</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($lessonHours as $lh)
                            <tr>
                                <td>{{ $lh->waktu }}</td>
                                @foreach ($days as $day) 
                                    <td>
                                        @php
                                            $schedule = $classSchedules
                                                ->where('id_class', $class->id)
                                                ->where('id_lesson_hours', $lh->id)
                                                ->where('hari', $day->hari)
                                                ->first();
                                        @endphp
                                        {{-- Tampilkan data jadwal pelajaran --}}
                                        @if($schedule)
                                            {{ $schedule->course->nama_mapel }}
                                        @endif
                                    </td>
                                @endforeach
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @endforeach
        
        </div>
    </div>
    <!-- /.content -->
@endsection