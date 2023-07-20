@extends('layouts.master')
@section('title') @lang('translation.Basic_Elements')  @endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') Lokasi @endslot
@slot('title') Tambah Lokasi @endslot
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
                <form action="{{ route('dashboard.lokasi.update', $lokasi->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="mb-4">
                        <label class="form-label" for="lokasi">Lokasi</label>
                        <input class="form-control" value="{{$lokasi->nama_lokasi}}" type="text" id="lokasi" name="nama_lokasi" placeholder="Lokasi">
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
