@extends('layouts.master')
@section('title') Tambah Users @endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') User @endslot
@slot('title') Tambah Users @endslot
@endcomponent

<!-- Start row -->
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Silahkan tambah data users disini.</h4>
                <p class="card-title-desc">Harap isi semua data dengan lengkap.</p>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.dashboard.users.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="name">Nama:</label>
                                <input type="text" name="name" id="name" placeholder="Nama" class="form-control mb-4 @error('name') is-invalid @enderror">
                            
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="text" name="email" id="email" placeholder="Email" class="form-control mb-4 @error('email') is-invalid @enderror">
                            
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" name="password" id="password" placeholder="Password" class="form-control mb-4 @error('password') is-invalid @enderror">
                            
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="confirm-password">Konfirmasi Password:</label>
                                <input type="password" name="confirm-password" id="confirm-password" placeholder="Confirm Password" class="form-control mb-4">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="avatar">Avatar:</label>
                                <div class="@error('avatar') is-invalid @enderror">
                                    <div class="fallback">
                                        <input name="avatar" type="file" accept=".png, .jpg, .jpeg">
                                    </div>
                                </div>
    
                                @error('avatar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="roles">Role:</label>
                                <select name="roles" id="roles" class="form-control mb-4 @error('roles') is-invalid @enderror">
                                    <option selected="true" disabled="disabled">Pilih roles</option>
                                    @foreach ($roles as $role)
                                        <option value="{{$role->id}}">{{$role->name}}</option>
                                    @endforeach
                                </select>

                                @error('roles')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 text-center">
                            <button type="submit" class="col-12 btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end row -->
@endsection
@section('script')
<script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection
