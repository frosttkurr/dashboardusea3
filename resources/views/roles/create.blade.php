@extends('layouts.master')
@section('title') Tambah Roles  @endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') Biota @endslot
@slot('title') Tambah Roles @endslot
@endcomponent

<!-- Start row -->
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Silahkan tambah data roles disini.</h4>
                <p class="card-title-desc">Harap isi semua data dengan lengkap.</p>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.dashboard.roles.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="name">Nama:</label>
                                <input type="text" name="name" id="name" placeholder="Nama" value="{{ old('name') }}" class="form-control mb-4 @error('name') is-invalid @enderror">
                            
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group @error('permission') is-invalid @enderror">
                                <label for="permission">Permission:</label>
                                @foreach ($permissions as $permission)
                                    <div class="form-check">
                                        <input type="checkbox" name="permission[]" id="permission_{{ $permission->id }}" value="{{ $permission->id }}" class="form-check-input">
                                        <label for="permission_{{ $permission->id }}" class="form-check-label">{{ $permission->name }}</label>
                                    </div>
                                @endforeach
                            </div>

                            @error('permission')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="col-12 text-center">
                            <button type="submit" class="col-12 btn btn-primary">Tambah</button>
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
