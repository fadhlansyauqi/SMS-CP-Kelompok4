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
        <div class="card">
			<div class="card-body">
				<form action="{{route('student.create-attendance.store')}}" method="post">
					@csrf

					<div class="form-group">
						<label for="nis">NIS</label>
						<input type="text" name="nis" id="nis" class="form-control" required="required" placeholder="Masukkan NIS">
					</div>

                    <div class="form-group">
						<label for="nama">Nama Siswa</label>
						<input type="text" name="nama" id="nama" class="form-control" required="required" placeholder="Masukkan Nama Siswa">
					</div>

					<div class="form-group">
						<label for="tanggal_masuk">Tanggal</label>
                        <input type="date" name="tanggal_masuk" id="tanggal_masuk" class="form-control" required="required">
					</div>

                    <div class="form-group">
						<label for="jam_masuk">Jam Masuk</label>
                        <input type="time" name="jam_masuk" id="jam_masuk" class="form-control" required="required">
					</div>

                    <div class="form-group">
						<label for="keterangan">Keterangan</label>
						<textarea name="keterangan" id="keterangan" rows="3" class="form-control" required="required" placeholder="Masukkan Keterangan"></textarea>
					</div>

					<div class="text-right">
						<a href="{{route('student.attendance')}}" class="btn btn-outline-secondary mr-2" role="button">Batal</a>
						<button type="submit" class="btn btn-primary">Simpan</button>
					</div>
				</form>
			</div>
		</div>                 
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
