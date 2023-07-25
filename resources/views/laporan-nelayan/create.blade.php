@extends('layouts.master')
@section('title') @lang('translation.Basic_Elements')  @endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') Laporan Nelayan @endslot
@slot('title') Tambah Laporan Nelayan @endslot
@endcomponent

<!-- Start row -->
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <p class="card-title-desc">Laporkan data temuan biota pada form berikut:</p>
            </div>
            <div class="card-body">
                <form action="{{ route('dashboard.laporan-nelayan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="mb-4">
                        <label class="form-label">Lokasi</label>
                        <select name="id_lokasi" class="form-control @error('id_lokasi') is-invalid @enderror">
                            <option selected="true" disabled="disabled">Pilih Lokasi Temuan</option>   
                            @foreach ($lokasis as $lokasi)
                                <option value="{{ $lokasi->id }}">{{ $lokasi->nama_lokasi }}</option>
                            @endforeach
                        </select>

                        @error('id_lokasi')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Jenis Temuan</label>
                        <select name="id_jenis_temuan" class="form-control @error('id_jenis_temuan') is-invalid @enderror">
                            <option selected="true" disabled="disabled">Pilih Jenis Temuan</option>   
                            @foreach ($jenisTemuans as $jenisTemuan)
                                <option value="{{ $jenisTemuan->id }}">{{ $jenisTemuan->jenis_temuan }}</option>
                            @endforeach
                        </select>

                        @error('id_jenis_temuan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label" for="isi_laporan">Isi Laporan</label>
                        <textarea class="form-control @error('isi_laporan') is-invalid @enderror" type="text" id="isi_laporan" name="isi_laporan" rows="4" placeholder="Jabarkan isi/keterangan laporan temuan biota"></textarea>
                        
                        @error('isi_laporan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label" for="isi_laporan">Tanggal</label>
                        <input name="tanggal" id="tanggal" class="form-control @error('tanggal') is-invalid @enderror" value="{{\Carbon\Carbon::now()->format('Y-m-d')}}" type="date">

                        @error('tanggal')
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
