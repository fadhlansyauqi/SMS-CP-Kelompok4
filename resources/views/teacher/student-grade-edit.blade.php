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
                        <a href="{{ route('admin.dashboard') }}" class="text-muted">Dashboard</a>
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

    <!-- Main content -->

    <div class="container">
        <div class="card card-custom">
            <div class="card-body">
                <h3 class="text-dark font-weight-bold mb-5 "><b>Data Nilai Siswa</b></h3>
                <div class="row">
                    <div class="col-4">
                        <form action="{{ route('teacher.student-grade') }}" method="GET">
                            <div class="form-group">
                                <div class="input-icon input-icon-right">
                                    <input type="text" name="search" value="{{ request('search') }}"
                                        class="form-control" placeholder="Search..." />
                                    <span><i class="flaticon2-search-1 icon-md"></i></span>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-2"></div>

                    <div class="col-6 text-right">
                        <form id="form1" class="form" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="date" class="form-control" id="date" name="date"
                                            value="{{ $grade->date ?? '' }}">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <select class="form-control" id="id_course" name="id_course">
                                            <option value="" disabled selected hidden>Pilih Mapel</option>
                                            @foreach ($courses as $course)
                                                <option value="{{ $course->id }}"
                                                    {{ $course->id == $grade->course->id ? 'selected' : '' }}>
                                                    {{ $course->nama_mapel ?? '' }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>


                </div>
                <div class="row table-responsive">
                    <form action="{{ route('teacher.student-grade.update', $grade->id) }}" id="form2" method="POST">
                        @csrf
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Siswa</th>
                                    <th>Jenis Nilai</th>
                                    <th>Nilai</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($detailGrades as $detailGrade)
                                    <tr>
                                        <td> {{ $loop->iteration }}</td>
                                        <td> {{ $detailGrade->student->nama }}</td>
                                        <td>
                                            <div class="form-group row">
                                                <div class="col-9 col-form-label">
                                                    <div class="radio-inline">
                                                        <label class="radio radio-success">
                                                            <input type="radio"
                                                                name="jenis_nilai[{{ $detailGrade->student->id }}]"
                                                                class="jenis_nilai" value="Quiz"
                                                                {{ $detailGrade->jenis_nilai === 'Quiz' ? 'checked' : '' }}
                                                                form="form2" />
                                                            <span></span>
                                                            Quiz
                                                        </label>
                                                        <label class="radio radio-primary">
                                                            <input type="radio"
                                                                name="jenis_nilai[{{ $detailGrade->student->id }}]"
                                                                class="jenis_nilai" value="Ulangan"
                                                                {{ $detailGrade->jenis_nilai === 'Ulangan' ? 'checked' : '' }}
                                                                form="form2" />
                                                            <span></span>
                                                            Ulangan
                                                        </label>
                                                        <label class="radio radio-warning">
                                                            <input type="radio"
                                                                name="jenis_nilai[{{ $detailGrade->student->id }}]"
                                                                class="jenis_nilai" value="UTS"
                                                                {{ $detailGrade->jenis_nilai === 'UTS' ? 'checked' : '' }}
                                                                form="form2" />
                                                            <span></span>
                                                            UTS
                                                        </label>
                                                        <label class="radio radio-danger">
                                                            <input type="radio"
                                                                name="jenis_nilai[{{ $detailGrade->student->id }}]"
                                                                class="jenis_nilai" value="UAS"
                                                                {{ $detailGrade->jenis_nilai === 'UAS' ? 'checked' : '' }}
                                                                form="form2" />
                                                            <span></span>
                                                            UAS
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                        </td><!-- Display class name -->
                                        <td>
                                            <!--begin::Group-->
                                            <div class="form-group">
                                                <input type="text" name="nilai[{{ $detailGrade->student->id }}]"
                                                    class="form-control" value="{{ $detailGrade->nilai }}">
                                            </div>
                                            <!--end::Group-->
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="text-right mt-5">
                            <a href="{{ route('teacher.student-grade') }}" class="btn btn-outline-danger mr-2"
                                role="button">Batal</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>

                    <div class="d-flex justify-content-between align-items-center flex-wrap">
                        <div class="d-flex align-items-center py-3">
                            <div class="d-flex align-items-center">
                                <span class="text-muted mr-2">Show</span>
                            </div>

                            <form method="GET" action="{{ route('teacher.student-grade') }}">
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

                        {{-- <div id="paginationLinks">
                            {{ $attendances->links() }}
                        </div> --}}
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
                    "{{ route('teacher.student-grade') }}?search={{ request('search') }}&per_page=" +
                    $(this)
                    .val();
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#form2').on('submit', function(e) {
                e.preventDefault();

                let id_course = $("#id_course").val();
                let date = $("#date").val();

                let newInputCourse = document.createElement("input");
                newInputCourse.setAttribute("type", "hidden");
                newInputCourse.setAttribute("name", "id_course");
                newInputCourse.setAttribute("value", id_course);

                let newInputDate = document.createElement("input");
                newInputDate.setAttribute("type", "hidden");
                newInputDate.setAttribute("name", "date");
                newInputDate.setAttribute("value", date);

                this.appendChild(newInputCourse);
                this.appendChild(newInputDate);

                // Submit the first form
                this.submit();
            });
        });
    </script>
    <!--end::content-->
@endsection
