@extends('layouts.app')

@section('content')
    <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <!--begin::Page Title-->
                    <h3 class="text-dark font-weight-bold my-1 mr-5"><b>Kelola Akun</b></h3>
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
                        <a href="" class="text-muted">Kelola Akun</a>
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
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <div class="input-icon input-icon-right">
                                <input type="search" wire:model="search" class="form-control" placeholder="Search..." />
                                <span><i class="flaticon2-search-1 icon-md"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                    </div>
                    <div class="col-5 text-right">
                            <a href="{{ route('admin.account.create') }}"
                            type="button" class="btn btn-primary"><i class="flaticon2-add-1"></i><strong> New
                                Account</strong></a>
                    </div>
                </div>
                <div class="row table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @php
                                $num = ($users->currentPage() - 1) * $users->perPage() + 1;
                            @endphp --}}
    
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->role }}</td>
                                    <td>
                                        
                                    <a href=""><i class="flaticon2-edit mr-3"></i></a>

                                    <a href=""><i class="flaticon2-trash mr-3"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-between align-items-center flex-wrap">
                        <div class="d-flex align-items-center py-3">
                            <div class="d-flex align-items-center">
                                <span class="text-muted mr-2">Show</span>
                            </div>
    
                            <select wire:model='entries'
                                class="form-control form-control-sm font-weight-bold mr-4 border-0 bg-light"
                                style="width: 75px;">
                                <option value="5" selected>5</option>
                                <option value="10">10</option>
                                <option value="20">20</option>
                                <option value="30">30</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                            {{-- <span class="text-muted"> of {{ $this->count }}</span> --}}
                        </div>
                        {{-- {{ $users->links() }} --}}
                    </div>
                </div>
            </div>
        </div>
    
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-sm wire:" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <div class="modal-body d-flex justify-content-center align-items-center">
                        <div class="mx-auto text-center">
                            <i class="text-danger flaticon-delete-1 icon-3x"></i>
                            <h3 class="mt-5"><strong> Delete User</h3></strong>
                            <h8 class="mt-3"><small class="text-muted"> Are you sure
                                    want
                                    to
                                    delete user?</small></h8>
                            </h8>
                            <br>
                            <div class="mt-5">
                                <button type="button" class="btn btn-danger font-weight-bold" data-dismiss="modal"
                                    style="width: 120px">Close</button>
                                <button type="button" wire:click="delete" class="btn btn-outline-danger font-weight-bold"
                                    style="width: 120px">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @push('script')
            <script>
                window.addEventListener('showDeleteModal', event => {
                    $("#deleteModal").modal('show');
                })
                window.addEventListener('closeDeleteModal', event => {
                    $("#deleteModal").modal('hide');
                })
            </script>
        @endpush
    </div>
    
    <!-- /.content -->
@endsection
