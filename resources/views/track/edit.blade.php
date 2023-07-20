@extends('layouts.master')
@section('title') @lang('translation.Basic_Elements')  @endsection
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
                <h4 class="card-title">Sizing</h4>
                <p class="card-title-desc">Set heights using classes like <code>.form-control-lg</code> and <code>.form-control-sm</code>.</p>
            </div>
            <div class="card-body">
                <form action="{{ route('dashboard.track.update', $track->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="mb-4">
                        <label class="form-label" for="isi_laporan">Tanggal</label>
                        <input name="tanggal" id="tanggal" class="form-control" required="" value="{{$track->tanggal}}" type="date">
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
