@extends('layouts.app')

@section('content')
    <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <!--begin::Page Title-->
                    <h3 class="text-dark font-weight-bold my-1 mr-5"><b>Mata Pelajaran</b></h3>
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
                        <a href="" class="text-muted">Mata Pelajaran</a>
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
                    <a href="{{ route('create.course') }}" class="btn btn-primary" role="button">Tambah mapel</a> 
                </div>

                <div class="card-body">
                    <table class="table mb-0 table-bordered">
                        <thead class="text-center bg-secondary">
                            <tr>
                                <td style="width: 4%">No</td>
                                <td style="width: 15%">Kode Mapel</td>
                                <td>Nama Mapel</td>
                                <td>Guru Pengampu</td>
                                <td style="width: 15%">Aksi</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($courses as $course)
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
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
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