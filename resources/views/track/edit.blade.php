@extends('layouts.master')
@section('title') Ubah Track @endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') Track @endslot
@slot('title') Ubah Track @endslot
@endcomponent

<!-- Start row -->
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <p class="card-title-desc">Harap isi data dengan benar agar informasi yang diberikan sesuai.</p>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.dashboard.track.update', $track->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="mb-4">
                        <label class="form-label" for="isi_laporan">Tanggal</label>
                        <input name="tanggal" id="tanggal" class="form-control @error('tanggal') is-invalid @enderror" value="{{$track->tanggal}}" type="date">
                    
                        @error('tanggal')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label" for="is_valid">Status</label>
                        <select class="form-control @error('is_valid') is-invalid @enderror" data-trigger name="is_valid" id="choices-single-default">
                            <option selected="true" disabled="disabled">Pilih status track</option>
                            <option value="0" @if ($track->is_valid == 0) selected @endif>Belum Valid</option>
                            <option value="1" @if ($track->is_valid == 1) selected @endif>Valid</option>
                        </select>

                        @error('is_valid')
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
