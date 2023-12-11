@extends('layouts.app')

@section('content')
    <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <!--begin::Page Title-->
                    <h3 class="text-dark font-weight-bold my-1 mr-5"><b>Tambah Mapel</b></h3>
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
                        <a href="" class="text-muted">Tambah Mapel</a>
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
                    <form action="{{ route('store.course') }}" method="post">
                        @csrf

                        <div class="form-group"> 
                            <label for="kode_mapel">Kode Mapel</label> 
                            <input type="text" name="kode_mapel" id="kode_mapel" class="form-control" required="required" placeholder="Masukkan Kode Mapel"> 
                        </div>

                        <div class="form-group"> 
                            <label for="nama_mapel">Nama Mapel</label> 
                            <input type="text" name="nama_mapel" id="nama_mapel" class="form-control" required="required" placeholder="Masukkan Nama Mapel"> 
                        </div>

                        <div class="form-group"> 
                            <label for="nama">Guru Pengampu</label> 
                            <select class="form-control" name="id_teacher" id="id_teacher" required="required"> 
                                @foreach ($teachers as $teacher) 
                                    <option value="{{ $teacher->id }}">{{ $teacher->nama }}</option> 
                                @endforeach 
                            </select> 
                        </div>
    
                        <div class="text-right"> 
                            <a href="{{ route('admin.student') }}" class="btn btn-outline-danger mr-2" role="button">Batal</a> 
                            <button type="submit" class="btn btn-primary">Simpan</button> 
                        </div>
                    </form>
                </div>
            </div>

        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
