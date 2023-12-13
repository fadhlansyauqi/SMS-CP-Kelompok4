@extends('layouts.app')

@section('content')
    <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <!--begin::Page Title-->
                    <h3 class="text-dark font-weight-bold my-1 mr-5"><b>Edit Akun</b></h3>
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
                        <a href="{{ route('admin.account') }}" class="text-muted">Kelola Akun</a>
                    </li>
                    <li class="breadcrumb-item text-muted">
                        <a href="" class="text-muted">Edit Akun</a>
                    </li>
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Toolbar-->
        </div>
    </div>

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">

            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.account.update', ['user' => $user->id]) }}" method="post">
                        @csrf

                        <div class="form-group mt-5">
                            <label for=""><strong>Nama User</strong></label>
                            <input type="text" name="name" id="name" class="form-control"
                                placeholder="Masukkan Nama">
                            @error('name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="form-group mt-5">
                            <label for=""><strong>Email User</strong></label>
                                <input type="text" name="email" id="email" class="form-control" value="{{ $user->email }}"
                                placeholder="Masukkan Email">
                            
                            @error('email')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <div class="input-icon input-icon-right" id="passwordToggle">
                            <input type="password" name="password" id="password" class="form-control" value="{{ $user->password }}"
                                placeholder="Masukkan Password Minimal 3 karakter">
                                <span id="showPassword"><i class="fa fa-eye-slash"
                                    aria-hidden="true"></i></span>
                            </div>
                            @error('password')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="role" class="form-label">Role</label>
                            <select class="form-control" id="role" name="role" title="Pilih role">
                                <option value="" disabled hidden>Pilih role</option>
                                <option value="TEACHER" @if($user->role == 'TEACHER') selected @endif>Teacher</option>
                                <option value="STUDENT" @if($user->role == 'STUDENT') selected @endif>Student</option>
                            </select>
                            @error('role')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
    
                        <div class="text-right"> 
                            <a href="{{ route('admin.account') }}" class="btn btn-outline-danger mr-2" role="button">Batal</a> 
                            <button type="submit" class="btn btn-primary">Simpan</button> 
                        </div>
                    </form>
                </div>
            </div>

        </div><!-- /.container-fluid -->
    </div>
    <!--end::content-->
    @push('script')
        <script>

            function togglePasswordVisibility(inputElement, iconElement) {
                if (inputElement.type === "password") {
                    inputElement.type = "text";
                    iconElement.innerHTML = '<i class="fa fa-eye" aria-hidden="true"></i>';
                } else {
                    inputElement.type = "password";
                    iconElement.innerHTML = '<i class="fa fa-eye-slash" aria-hidden="true"></i>';
                }
            }

            const passwordInput = document.getElementById("password");
            const showPasswordButton = document.getElementById("showPassword");

            showPasswordButton.addEventListener("click", function() {
                togglePasswordVisibility(passwordInput, showPasswordButton);
            });
        </script>
    @endpush
@endsection
