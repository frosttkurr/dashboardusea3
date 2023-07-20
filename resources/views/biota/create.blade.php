@extends('layouts.master')
@section('title') @lang('translation.Basic_Elements')  @endsection
@section('css')
<link href="{{ URL::asset('/assets/libs/dropzone/dropzone.min.css') }}" rel="stylesheet">
@section('content')
@component('components.breadcrumb')
@slot('li_1') Biota @endslot
@slot('title') Tambah Biota @endslot
@endcomponent

<!-- Start row -->
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Silahkan tambah spesies biota disini.</h4>
                <p class="card-title-desc">Harap isi semua data dengan lengkap agar informasi yang diberikan sesuai.</p>
            </div>
            <div class="card-body">
                <form action="{{ route('dashboard.biota.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="mb-4">
                        <label class="form-label" for="biota">Biota</label>
                        <input class="form-control" type="text" id="biota" name="nama_biota" placeholder="Nama Biota">
                    </div>
                    <div class="mb-4">
                        <!-- <label for="choices-single-default" class="form-label font-size-13 text-muted">Default</label> -->
                            <label class="form-label" for="biota">Jenis Biota</label>
                                <select class="form-control" data-trigger name="id_jenis_biota"
                                    id="choices-single-default"
                                    placeholder="Cari jenis biota">
                                    <option value="">Pilih jenis biota</option>
                                    @foreach($jenisBiotas as $jenisBiota)
                                    
                                    <option value="{{$jenisBiota->id}}">{{$jenisBiota->jenis_biota}}</option>
                                    @endforeach
                                    <!-- <option value="Choice 2">Choice 2</option>
                                    <option value="Choice 3">Choice 3</option> -->
                                </select>
                        <!-- <label class="form-label" for="biota">Jenis Biota</label>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                $jenisBiota <i class="mdi mdi-chevron-down"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" >
                                @foreach($jenisBiotas as $jenisBiota)
                                <a class="dropdown-item" href="#">{{$jenisBiota->jenis_biota}}</a>
                                @endforeach
                            </div>
                        </div> -->
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="biota">Deskripsi</label>
                        <input class="form-control" type="text" id="deskripsi" name="deskripsi" placeholder="Deskripsi">
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


                    
                    <button type="submit" class="mt-1 btn btn-primary waves-effect waves-light">Tambah Data</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end row -->
@endsection
@section('script')
<script src="{{ URL::asset('/assets/libs/dropzone/dropzone.min.js') }}"></script>
<script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>

@endsection
