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
                        <a href="{{ route('admin.dashboard') }}" class="text-muted">Dashboard</a>
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

    <!-- Main content -->

    <div class="container">
        <div class="card card-custom">
            <div class="card-body">
                <h3 class="text-dark font-weight-bold mb-5 "><b>Data Absensi Siswa</b></h3>
                <div class="row">
                    <div class="col-4">
                        <form action="{{ route('teacher.student-attendance') }}" method="GET">
                            <div class="form-group">
                                <div class="input-icon input-icon-right">
                                    <input type="text" name="search" value="{{ request('search') }}"
                                        class="form-control" placeholder="Search..." />
                                    <span><i class="flaticon2-search-1 icon-md"></i></span>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-3"></div>
                    <div class="col-5 text-right">
                        <a href="{{ route('teacher.student-attendance-class') }}" type="button" class="btn btn-primary"><i
                                class="flaticon2-add-1"></i><strong>Absensi Baru</strong></a>
                    </div>
                </div>
                <div class="row table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Mata Pelajaran</th>
                                <th>Kelas</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($attendances as $attendance)
                                <tr>
                                    <td> {{ $loop->iteration }}</td>
                                    <td> {{ $attendance->date }}</td>
                                    <td> {{ $attendance->course->nama_mapel }} </td>
                                    <td> {{ $attendance->student_class->nama_kelas }} </td>
                                    <td>

                                        <a href="{{ route('edit.teacher', ['id_attendance' => $attendance->id]) }}"><i
                                                class="flaticon2-edit mr-3"></i></a>
                                        <a onclick="confirmDelete(this)"
                                            data-url="{{ route('delete.attendance', ['id_attendance' => $attendance->id]) }}"><i
                                                class="flaticon2-trash mr-3"></i></a></a>
                                        <a href="{{ route('teacher.student-attendance-detail', ['id_attendance' => $attendance->id]) }}"
                                            type="button" class="btn btn-success btn-sm"><strong>Detail</strong></a>
                                    </td>
                                <tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="d-flex justify-content-between align-items-center flex-wrap">
                        <div class="d-flex align-items-center py-3">
                            <div class="d-flex align-items-center">
                                <span class="text-muted mr-2">Show</span>
                            </div>

                            <form method="GET" action="{{ route('teacher.student-attendance') }}">
                                <select id="entries"
                                    class="form-control form-control-sm font-weight-bold mr-4 border-0 bg-light"
                                    style="width: 75px;" name="per_page" onchange="this.form.submit()">
                                    <option value="5" {{ request('per_page') == 5 ? 'selected' : '' }}>5</option>
                                    <option value="10" {{ request('per_page') == 10 ? 'selected' : '' }}>10</option>
                                    <option value="20" {{ request('per_page') == 20 ? 'selected' : '' }}>20</option>
                                    <option value="30" {{ request('per_page') == 30 ? 'selected' : '' }}>30</option>
                                    <!-- Tambahkan lebih banyak opsi jika diperlukan -->
                                </select>
                            </form>
                        </div>

                        <div id="paginationLinks">
                            {{ $attendances->links() }}
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
                    "{{ route('teacher.student-attendance') }}?search={{ request('search') }}&per_page=" +
                    $(this)
                    .val();
            });
        });
    </script>
    <!--end::content-->
@endsection

@section('addJavascript')
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>
    <script>
        confirmDelete = function(button) {
            var url = $(button).data('url');
            swal({
                'title': 'Konfirmasi Hapus',
                'text': 'Apakah Kamu Yakin Ingin Menghapus Data Ini?',
                'dangermode': true,
                'buttons': true
            }).then(function(value) {
                if (value) {
                    window.location = url;
                }
            })
        }
    </script>
@endsection
