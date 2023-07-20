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
                        <p class="card-title-desc">Ini Track</p>
                    </div>
                    
                    @can('track')
                    <div class="col-2 text-right">
                        <a href="track/create"><button type="button" class="mt-1 btn btn-primary waves-effect waves-light">Tambah Data</button></a>
                    </div>
                    @endcan
                </div>
                </div>
            <div class="card-body">

                <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                    <thead>
                    <tr>
                        <th class="col-4">Tanggal</th>
                        <th class="col-4">Status</th>
                        <th class="col-4">Action</th>
                    </tr>
                    </thead>


                    <tbody>
                    @foreach($tracks as $track)
                    <tr>
                        <td>{{$track->tanggal}}</td>
                        <td>
                            @if($track->is_valid == 0)
                                Belum Valid
                            @else
                                Valid
                            @endif
                        </td>
                        <td>
                            @can('track')
                                <a href="track/edit/{{$track->id}}"><button type="button" class="mt-1 btn btn-warning waves-effect waves-light">Edit</button></a>
                                <a onclick="return confirm ('Hapus data?')" href="track/destroy/{{$track->id}}"><button type="button" class="mt-1 btn btn-danger waves-effect waves-light">Hapus</button></a>
                            @endcan
                            <a href="track/detail/{{$track->id}}"><button type="button" class="mt-1 btn btn-primary waves-effect waves-light">Detail</button></a>
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
