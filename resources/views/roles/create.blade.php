@extends('layouts.master')
@section('title') @lang('translation.Basic_Elements')  @endsection
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
                                <label for="permission">Permission:</label>
                                <select name="permission" id="permission" class="form-control mb-4 @error('permission') is-invalid @enderror">
                                    <option selected="true" disabled="disabled">Pilih jenis permission</option>
                                    @foreach ($permissions as $permission)
                                        <option value="{{$permission->id}}">{{$permission->name}}</option>
                                    @endforeach
                                </select>

                                @error('permission')
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
