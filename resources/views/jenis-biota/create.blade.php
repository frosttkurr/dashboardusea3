@extends('layouts.master')
@section('title') @lang('translation.Basic_Elements')  @endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') Biota @endslot
@slot('title') Tambah Jenis Biota @endslot
@endcomponent

<!-- Start row -->
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Silahkan tambah jenis biota disini.</h4>
                <p class="card-title-desc">Harap isi semua data dengan lengkap agar informasi yang diberikan sesuai.</p>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.dashboard.jenis-biota.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="mb-4">
                        <label class="form-label" for="jenis_biota">Jenis Biota</label>
                        <input class="form-control @error('jenis_biota') is-invalid @enderror" type="text" id="jenis_biota" name="jenis_biota" placeholder="Jenis Biota">
                        
                        @error('jenis_biota')
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
