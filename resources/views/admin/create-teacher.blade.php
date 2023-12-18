@extends('layouts.app')

@section('content')
    <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <!--begin::Page Title-->
                    <h3 class="text-dark font-weight-bold my-1 mr-5"><b>Tambah Data Guru</b></h3>
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
                        <a href="" class="text-muted">Tambah Data Guru</a>
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
                    <a href="{{ route('admin.teacher') }}">
                        <i class="flaticon2-back icon-xm text-primary"> Kembali</i>
                    </a>
                    <h3 class="text-dark font-weight-bold mt-5 mb-5 "><b>Tambah Data Guru</b></h3>
                    <form action="{{ route('store.teacher') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group"> 
                            <label for="nip">NIP</label> 
                            <input type="text" name="nip" id="nip" class="form-control" required="required" placeholder="Masukkan NIP guru"> 
                        </div>

                        <div class="form-group"> 
                            <label for="nama">Nama Lengkap</label> 
                            <input type="text" name="nama" id="nama" class="form-control"   placeholder="Masukkan nama guru"> 
                        </div>

                        <div class="form-group"> 
                            <label for="tempat_lahir">Tempat Lahir</label> 
                            <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control"   placeholder="Masukkan tempat lahir guru"> 
                        </div>

                        <div class="form-group"> 
                            <label for="tanggal_lahir">Tanggal Lahir</label> 
                            <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control"   placeholder="Masukkan tanggal lahir guru"> 
                        </div>

                        <div class="form-group">
                            <label for="jk">Jenis Kelamin: </label>
                            <input type="radio" id="laki-laki" name="jk" value="laki-laki">
                            <label for="laki-laki"> Laki-laki </label>
                            <input type="radio" id="perempuan" name="jk" value="perempuan">
                            <label for="perempuan"> Perempuan</label><br>
                        </div>
    
                        <div class="form-group"> 
                            <label for="alamat">Alamat</label> 
                            <br><textarea name="alamat" id="alamat" rows="3" class="form-control"   placeholder="Masukkan alamat guru"></textarea>
                        </div>

                        <div class="form-group"> 
                            <label for="foto">Masukkan Foto</label> 
                            <p>
                                <img id="fotoPreview" src="#" alt="Pas Foto" style="display: none; width: 150px; height: 150px;">
                            </p>
                            <input type="file" name="foto" id="foto" class="form-control-file" onchange="previewFoto(event)" accept="image/*" />
                        </div>
    
                        <div class="text-right"> 
                            <a href="{{ route('admin.teacher') }}" class="btn btn-outline-danger mr-2" role="button">Batal</a> 
                            <button type="submit" class="btn btn-primary">Simpan</button> 
                        </div>
                    </form>
                </div>
            </div>

        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection

<script>
    function previewFoto(event) {
        var reader = new FileReader();
        reader.onload = function(){
            var fotoPreview = document.getElementById('fotoPreview');
            fotoPreview.src = reader.result;
            fotoPreview.style.display = 'block';
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
