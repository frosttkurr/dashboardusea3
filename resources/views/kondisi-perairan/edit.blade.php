@extends('layouts.master')
@section('title') Edit Kondisi Perairan  @endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') Kondisi Perairan @endslot
@slot('title') Edit Kondisi Perairan @endslot
@endcomponent

<!-- Start row -->
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <p class="card-title-desc">Harap isi data dengan benar agar informasi yang diberikan sesuai.</p>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.dashboard.kondisi-perairan.update', $kondisiPerairan->id) }}" method="POST" enctype="multipart/form-data">
                @csrf

                    <div class="mb-4">
                        <label class="form-label" for="isi_laporan">Tanggal</label>
                        <input name="tanggal" id="tanggal" class="form-control @error('tanggal') is-invalid @enderror" value="{{$kondisiPerairan->tanggal}}" type="date">
                    
                        @error('tanggal')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Lokasi</label>
                        <select name="id_lokasi" class="form-control @error('id_lokasi') is-invalid @enderror">
                            <option disabled="disabled">Pilih lokasi</option> 
                            @foreach ($lokasis as $lokasi)
                                <option value="{{ $lokasi->id }}" @if($lokasi->id == $kondisiPerairan->id_lokasi) selected @endif>{{ $lokasi->nama_lokasi }}</option>
                            @endforeach
                        </select>
                    
                        @error('id_lokasi')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label" for="kondisi">Kondisi</label>
                        <input class="form-control @error('kondisi') is-invalid @enderror" type="text" id="kondisi" name="kondisi" value="{{$kondisiPerairan->kondisi}}">
                    
                        @error('kondisi')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label" for="uraian">Uraian</label>
                        <textarea class="form-control @error('uraian') is-invalid @enderror" type="text" id="uraian" name="uraian" rows="4" >{{$kondisiPerairan->uraian}}</textarea>
                    
                        @error('uraian')
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
