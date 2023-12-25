@extends('layouts.app')

@section('content')
    <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <!--begin::Page Title-->
                    <h3 class="text-dark font-weight-bold my-1 mr-5"><b>Kelas Siswa</b></h3>
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
                        <a href="{{ route('teacher.student-class') }}" class="text-muted">Kelas Siswa</a>
                    </li>
                    <li class="breadcrumb-item text-muted">
                        <a href="javascript:void(0)" class="text-muted" disabled>List Data Siswa</a>
                    </li>
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Toolbar-->
        </div>
    </div>

    <!-- Main content -->

    <div class="container">
        <div class="card card-custom ">
            <div class="card-body">
                <a href="{{ route('teacher.student-class') }}">
                    <i class="flaticon2-back icon-xm text-primary"> Kembali</i>
                </a>
                <h3 class="text-dark font-weight-bold mt-5 mb-5 "><b>List Data Siswa</b></h3>
                <div class="row">
                    <div class="col-4">
                        <form action="{{ route('teacher.student-class-data', ['idKelas' => $idKelas]) }}"
                            method="GET">
                            <div class="form-group">
                                <div class="input-icon input-icon-right">
                                    <input type="text" name="search" value="{{ $search }}" class="form-control"
                                        placeholder="Search..." />
                                    <span><i class="flaticon2-search-1 icon-md"></i></span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row table-responsive mx-3">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIS</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Kelas</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $student)
                                <tr>
                                    <td> {{ $loop->iteration }}</td>
                                    <td> {{ $student->nis }}</td>
                                    <td> {{ $student->user->name }} </td>
                                    <td> {{ $student->jk }} </td>
                                    <td> {{ $student->student_class ? $student->student_class->nama_kelas : 'No class' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="d-flex justify-content-between align-items-center flex-wrap">
                        <div class="d-flex align-items-center py-3">
                            <div class="d-flex align-items-center">
                                <span class="text-muted mr-2">Show</span>
                            </div>

                            <form method="GET"
                                action="{{ route('teacher.student-class-data', ['idKelas' => $idKelas]) }}">
                                <select id="entries"
                                    class="form-control form-control-sm font-weight-bold mr-4 border-0 bg-light"
                                    style="width: 75px;" name="per_page" onchange="this.form.submit()">
                                    <option value="5" {{ request('per_page') == 5 ? 'selected' : '' }}>5</option>
                                    <option value="10" {{ request('per_page') == 10 ? 'selected' : '' }}>10
                                    </option>
                                    <option value="20" {{ request('per_page') == 20 ? 'selected' : '' }}>20
                                    </option>
                                    <option value="30" {{ request('per_page') == 30 ? 'selected' : '' }}>30
                                    </option>
                                    <!-- Add more options if needed -->
                                </select>
                            </form>
                        </div>

                        <div id="paginationLinks">
                            {{ $students->links() }}
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
                    "{{ route('teacher.student-class-data', ['idKelas' => $idKelas]) }}?search={{ request('search') }}&per_page=" +
                    $(this)
                    .val();
            });
        });
    </script>
    <!--end::content-->
@endsection
