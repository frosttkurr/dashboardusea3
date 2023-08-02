@extends('layouts.master')
@section('title') Tambah Jenis Temuan @endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') Temuan @endslot
@slot('title') Tambah Jenis Temuan @endslot
@endcomponent

<!-- Start row -->
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Silahkan tambah jenis temuan biota disini.</h4>
                <p class="card-title-desc">Harap isi semua data dengan lengkap agar informasi yang diberikan sesuai.</p>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.dashboard.jenis-temuan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="mb-4">
                        <label class="form-label" for="jenis_temuan">Jenis Temuan</label>
                        <input class="form-control @error('jenis_temuan') is-invalid @enderror" type="text" id="jenis_temuan" name="jenis_temuan" placeholder="Jenis Temuan">
                    
                        @error('jenis_temuan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <button type="submit" class="mt-1 btn btn-primary waves-effect waves-light">Tambah Data</button>
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
