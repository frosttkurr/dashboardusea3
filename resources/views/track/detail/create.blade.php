@extends('layouts.master')
@section('title') @lang('translation.Basic_Elements')  @endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') Track @endslot
@slot('title') Tambah Track @endslot
@endcomponent

<!-- Start row -->
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Sizing</h4>
                <p class="card-title-desc">Set heights using classes like <code>.form-control-lg</code> and <code>.form-control-sm</code>.</p>
            </div>
            <div class="card-body">
                <form action="{{ route('dashboard.track.detail.store', $trackId) }}" method="POST" enctype="multipart/form-data">
                @csrf

                    <div class="mb-4">
                        <label class="form-label">Biota</label>
                        <select name="id_biota" class="form-control">
                            <option></option>   
                            @foreach ($biotas as $biota)
                                <option value="{{ $biota->id }}">{{ $biota->nama_biota }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Lokasi</label>
                        <select name="id_lokasi" class="form-control">
                            <option></option>   
                            @foreach ($lokasis as $lokasi)
                                <option value="{{ $lokasi->id }}">{{ $lokasi->nama_lokasi }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="form-label" for="image">Gambar</label>
                        <input type="file" name="image" class="form-control">
                    </div>                    

                    <div class="mb-4">
                        <label class="form-label" for="keterangan">Keterangan</label>
                        <textarea class="form-control" type="text" id="keterangan" name="keterangan" rows="4" ></textarea>
                    </div>

                    
                    <input type="hidden" name="id_track" class="form-control" value="{{$trackId}}">
                    
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
