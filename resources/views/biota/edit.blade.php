@extends('layouts.master')
@section('title') @lang('translation.Basic_Elements')  @endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') Biota @endslot
@slot('title') Edit Biota @endslot
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
                <form action="{{ route('dashboard.biota.update', $biota->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="mb-4">
                        <label class="form-label" for="biota">Biota</label>
                        <input class="form-control" value="{{$biota->nama_biota}}" type="text" id="nama_biota" name="nama_biota" placeholder="Nama Biota">
                    </div>
                    
                    <label class="form-label" for="biota">Jenis Biota</label>
                    <select class="form-control mb-4" data-trigger name="id_jenis_biota"
                        id="choices-single-default"
                        placeholder="Cari jenis biota">
                        <option value="">Pilih jenis biota</option>
                         @foreach($jenisBiotas as $jenisBiota)                                   
                        <option value="{{$biota->jenisBiota['jenis_biota']}}">{{$jenisBiota->jenis_biota}}</option>
                        @endforeach
                    </select>
                    <div class="mb-4">
                        <label class="form-label" for="biota">Deskripsi</label>
                        <input class="form-control" value="{{$biota->deskripsi}}" type="text" id="deskripsi" name="deskripsi" placeholder="Deskripsi">
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Gambar</h4>
                            <p class="card-title-desc">Silahkan upload file gambar dari biota disini.
                            </p>
                        </div>
                        <div class="card-body">

                            <div>
                                    <div class="fallback">
                                        <input name="image" type="file">
                                    </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="mt-1 btn btn-primary waves-effect waves-light">Update Data</button>
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
