@extends('layouts.master')
@section('title') @lang('translation.Basic_Elements')  @endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') Track @endslot
@slot('title') Ubah Track Detail @endslot
@endcomponent

<!-- Start row -->
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <p class="card-title-desc">Harap isi data dengan benar agar informasi yang diberikan sesuai.</p>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.dashboard.track.detail.update', [$track_id, $trackDetail->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="mb-4">
                        <label class="form-label">Biota</label>
                        <select name="id_biota" class="form-control @error('id_biota') is-invalid @enderror">
                            <option selected="true" disabled="disabled">Pilih Biota</option>   
                            @foreach ($biotas as $biota)
                                <option value="{{ $biota->id }}" @if($biota->id == $trackDetail->id_biota) selected @endif>{{ $biota->nama_biota }}</option>
                            @endforeach
                        </select>

                        @error('id_biota')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Lokasi</label>
                        <select name="id_lokasi" class="form-control @error('id_lokasi') is-invalid @enderror">
                            <option selected="true" disabled="disabled">Pilih lokasi</option>
                            @foreach ($lokasis as $lokasi)
                                <option value="{{ $lokasi->id }}" @if($lokasi->id == $trackDetail->id_lokasi) selected @endif >{{ $lokasi->nama_lokasi }}</option>
                            @endforeach
                        </select>

                        @error('id_lokasi')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label" for="image">Gambar</label>
                        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">

                        @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>                    

                    <div class="mb-4">
                        <label class="form-label" for="keterangan">Keterangan</label>
                        <textarea class="form-control @error('keterangan') is-invalid @enderror" type="text" id="keterangan" name="keterangan" rows="4" >{{$trackDetail->keterangan}}</textarea>

                        @error('keterangan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <input type="hidden" name="id_track" class="form-control" value="{{$track_id}}">
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
