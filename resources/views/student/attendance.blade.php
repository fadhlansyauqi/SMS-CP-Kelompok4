@extends('layouts.app')

@section('content')
    <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <!--begin::Page Title-->
                    <h3 class="text-dark font-weight-bold my-1 mr-5"><b>Absen Saya</b></h3>
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
                        <a href="" class="text-muted">Absen Saya</a>
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
            <div class="card-header text-right">
                <a href="{{ route('student.create-attendance.create')}}" class="btn btn-primary" role="button">Absen</a>
            </div>

            <div class="card-body mt-5 rounded-bottom text-center" style="background-color: white;" >
				<table class="table table-hover table-bordered" id="data-table">
					<thead>
						<tr>
							<th>No.</th>
							<th>Nis</th>
							<th>Nama</th>
							<th>Tanggal</th>
                            <th>Jam</th>
                            <th>Keterangan</th>
						</tr>
					</thead>
					<tbody>

		@foreach ($attendance as $attendances)
    <tr>
        <td>{{ $loop->index + 1 }}</td>
        <td>{{ $attendances->nis }}</td>
        <td>{{ $attendances->nama }}</td>
        <td>{{ $attendances->tanggal_masuk }}</td>
        <td>{{ $attendances->jam_masuk }}</td>
        <td>{{ $attendances->keterangan }}</td>
        <td>
            <a href="{{ route('student.edit-attendance.edit', ['id' => $attendances->id]) }}" class="btn btn-warning btn-sm" role="button">Edit</a>
            <a onclick="confirmDelete(this)" data-url="{{ route('student.edit-attendance.delete', ['id' => $attendances->id]) }}" class="btn btn-warning btn-danger btn-sm" role="button">Hapus</a>
        </td>
    </tr>
@endforeach

					</tbody>
				</table>
			</div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
