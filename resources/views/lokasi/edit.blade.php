@extends('layouts.master')
@section('title') Ubah Lokasi  @endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') Lokasi @endslot
@slot('title') Ubah Lokasi @endslot
@endcomponent

<!-- Start row -->
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <p class="card-title-desc">Harap isi data dengan benar agar informasi yang diberikan sesuai.</p>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.dashboard.lokasi.update', $lokasi->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="mb-4">
                        <label class="form-label" for="lokasi">Lokasi</label>
                        <input class="form-control @error('nama_lokasi') is-invalid @enderror" value="{{$lokasi->nama_lokasi}}" type="text" id="lokasi" name="nama_lokasi" placeholder="Lokasi">
                    
                        @error('nama_lokasi')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <button type="submit" class="mt-1 btn btn-primary waves-effect waves-light">Ubah Data</button>
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
