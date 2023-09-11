@extends('layouts.master')
@section('title') Track  @endsection
@section('css')
<link href="{{ URL::asset('assets/libs/datatables.net-bs4/datatables.net-bs4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('assets/libs/datatables.net-buttons-bs4/datatables.net-buttons-bs4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('assets/libs/datatables.net-responsive-bs4/datatables.net-responsive-bs4.min.css') }}" rel="stylesheet" type="text/css" />

@endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') U-Sea @endslot
@slot('title') Track @endslot
@endcomponent

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-10">
                        <h4 class="card-title">Track</h4>
                        <p class="card-title-desc">Data track biota yang tersedia</p>
                    </div>
                </div>
            </div>
            <div class="card-body">

                <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                    <thead>
                    <tr>
                        <th class="col-1">No.</th>
                        <th class="col-4">Tanggal</th>
                        <th class="col-4">Status</th>
                        <th class="col-4">Action</th>
                    </tr>
                    </thead>


                    <tbody>
                    @foreach($tracks as $key => $track)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{date('d-M-Y', strtotime($track->tanggal))}}</td>
                        <td>
                            @if($track->is_valid == 0)
                                <span id="badge_status_{{ $track->id }}" class="badge badge-warning">Belum Valid</span>
                            @else
                                <span id="badge_status_{{ $track->id }}" class="badge badge-success">Valid</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('dashboard.track.detail.index', $track->id) }}"><button type="button" class="mt-1 btn btn-secondary waves-effect waves-light">Detail</button></a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->

@endsection
@section('script')
<script src="{{ URL::asset('assets/libs/datatables.net/datatables.net.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/datatables.net-bs4/datatables.net-bs4.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/datatables.net-buttons/datatables.net-buttons.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/datatables.net-buttons-bs4/datatables.net-buttons-bs4.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/jszip/jszip.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/datatables.net-responsive/datatables.net-responsive.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/datatables.net-responsive-bs4/datatables.net-responsive-bs4.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/pages/datatables.init.js') }}"></script>
<script src="{{ URL::asset('assets/js/app.min.js') }}"></script>
@endsection
