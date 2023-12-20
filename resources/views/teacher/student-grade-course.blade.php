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

        <div class="container">
            <div class="card card-custom">
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <form action="{{ route('admin.teacher') }}" method="GET">
                                <div class="form-group">
                                    <div class="input-icon input-icon-right">
                                        <input type="text" name="search" value="{{ request('search') }}"
                                            class="form-control" placeholder="Search..." />
                                        <span><i class="flaticon2-search-1 icon-md"></i></span>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="row table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <td style="width: 4%">No</td>
                                        <td style="width: 15%">Kode Mapel</td>
                                        <td>Nama Mapel</td>
                                        <td>Guru Pengampu</td>
                                        <td style="width: 30%">Aksi</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($courses as $course)
                                        <tr>
                                            <td class="text-center"> {{ $loop->iteration }}</td>
                                            <td> {{ $course->kode_mapel }}</td>
                                            <td> {{ $course->nama_mapel }} </td>
                                            <td> {{ $course->teacher ? $course->teacher->nama : '-' }}
                                            </td>
                                            <td>
                                                <!-- Action buttons -->
                                                <a href="{{ route('teacher.student-grade-name') }}"
                                                    class="btn btn-warning btn-sm" role="button">Lihat Siswa</a>
                                            </td>
                                    @endforeach
                                    </tr>
                                </tbody>
                            </table>

                            <div class="d-flex justify-content-between align-items-center flex-wrap">
                                <div class="d-flex align-items-center py-3">
                                    <div class="d-flex align-items-center">
                                        <span class="text-muted mr-2">Show</span>
                                    </div>

                                    <form method="GET" action="{{ route('teacher.student-grade-course') }}">
                                        <select id="entries"
                                            class="form-control form-control-sm font-weight-bold mr-4 border-0 bg-light"
                                            style="width: 75px;" name="per_page" onchange="this.form.submit()">
                                            <option value="5" {{ request('per_page') == 5 ? 'selected' : '' }}>5
                                            </option>
                                            <option value="10" {{ request('per_page') == 10 ? 'selected' : '' }}>10
                                            </option>
                                            <option value="20" {{ request('per_page') == 20 ? 'selected' : '' }}>20
                                            </option>
                                            <option value="30" {{ request('per_page') == 30 ? 'selected' : '' }}>30
                                            </option>
                                            <!-- Tambahkan lebih banyak opsi jika diperlukan -->
                                        </select>
                                    </form>
                                </div>

                                <div id="paginationLinks">
                                    {{ $courses->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
                $(document).ready(function() {
                    $(document).on('change', '#entries', function() {
                        window.location =
                            "{{ route('teacher.student-grade-course') }}?search={{ request('search') }}&per_page=" +
                            $(this)
                            .val();
                    });
                });
            </script>

        </div>
        <!-- /.content -->
    @endsection
