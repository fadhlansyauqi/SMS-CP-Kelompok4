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
                        <a href="{{ route('admin.student-attendance') }}" class="text-muted">Absen Siswa</a>
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
                <a href="{{ route('teacher.student-attendance-class') }}">
                    <i class="flaticon2-back icon-xm text-primary"> Kembali</i>
                </a>
                <h3 class="text-dark font-weight-bold mt-5 mb-5 "><b>List Data Siswa</b></h3>
                <div class="row">
                    <div class="col-4">
                        <form action="{{ route('teacher.student-attendance-class-data', ['idKelas' => $idKelas]) }}"
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
                    <div class="col-3"></div>
                    <div class="col-5 text-right">
                        <form id="form1" class="form" method="POST">
                            @csrf
                            <div class="form-group">
                                <select class="form-control" id="id_course" name="id_course">
                                    <option value="" disabled selected hidden>Pilih Mapel</option>
                                    @foreach ($courses as $course)
                                        <option value="{{ $course->id }}">{{ $course->nama_mapel ?? '' }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row table-responsive mx-3">
                    <form action="{{ route('teacher.student-attendance-class-data.store', $idKelas) }}" id="form2"
                        method="POST">
                        @csrf
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIS</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Kelas</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $student)
                                    <tr id_student="{{ $student->id }}">
                                        <td> {{ $loop->iteration }}</td>
                                        <td> {{ $student->nis }}</td>
                                        <td> {{ $student->user->name }} </td>
                                        <td> {{ $student->jk }} </td>
                                        <td> {{ $student->student_class ? $student->student_class->nama_kelas : 'No class' }}
                                        </td>
                                        <td>
                                            <div class="form-group row">
                                                <div class="col-9 col-form-label">
                                                    <div class="radio-inline">
                                                        <label class="radio radio-success">
                                                            <input type="radio" name="status[{{ $student->id }}]"
                                                                class="status" value="Hadir" form="form2" />
                                                            <span></span>
                                                            Hadir
                                                        </label>
                                                        <label class="radio radio-primary">
                                                            <input type="radio" name="status[{{ $student->id }}]"
                                                                class="status" value="Izin" form="form2" />
                                                            <span></span>
                                                            Izin
                                                        </label>
                                                        <label class="radio radio-warning">
                                                            <input type="radio" name="status[{{ $student->id }}]"
                                                                class="status" value="Sakit" form="form2" />
                                                            <span></span>
                                                            Sakit
                                                        </label>
                                                        <label class="radio radio-danger">
                                                            <input type="radio" name="status[{{ $student->id }}]"
                                                                class="status" value="Alfa" form="form2" />
                                                            <span></span>
                                                            Alfa
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                        </td><!-- Display class name -->
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>


                        <div class="text-right mt-5">
                            <a href="{{ route('teacher.student-attendance-class') }}" class="btn btn-outline-danger mr-2"
                                role="button">Batal</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>

                    <div class="d-flex justify-content-between align-items-center flex-wrap">
                        <div class="d-flex align-items-center py-3">
                            <div class="d-flex align-items-center">
                                <span class="text-muted mr-2">Show</span>
                            </div>

                            <form method="GET"
                                action="{{ route('teacher.student-attendance-class-data', ['idKelas' => $idKelas]) }}">
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
                    "{{ route('teacher.student-attendance-class-data', ['idKelas' => $idKelas]) }}?search={{ request('search') }}&per_page=" +
                    $(this)
                    .val();
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#form2').on('submit', function(e) {
                e.preventDefault();

                let form = new FormData(this)

                let id_course = $("#id_course").val()

                let newInput = document.createElement("input");
                newInput.setAttribute("type", "text");
                newInput.setAttribute("name", "id_course");
                newInput.setAttribute("hidden", true);

                newInput.setAttribute("value", id_course);

                this.appendChild(newInput);

                // Submit the first form
                this.submit();
            });

            // $('#form1').on('submit', function() {
            //     // Submit the second form
            //     $('#form2')[0].submit();
            // });
        });
    </script>
    <!--end::content-->
@endsection
