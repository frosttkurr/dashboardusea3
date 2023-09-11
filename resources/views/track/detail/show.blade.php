@extends('layouts.master')
@section('title') Show Track Detail @endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') Track @endslot
@slot('title') Show Track Detail @endslot
@endcomponent

<!-- Start row -->
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Track: {{ date('d-M-Y', strtotime($track->tanggal)) }}</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.dashboard.track.detail.update', [$track->id, $trackDetail->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="mb-4">
                        <label class="form-label">Biota</label>
                        <select name="id_biota" class="form-control @error('id_biota') is-invalid @enderror" disabled>
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
                        <select name="id_lokasi" class="form-control @error('id_lokasi') is-invalid @enderror" disabled>
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
                        <div class="bg-white">
                            <img src="{{ url('storage/'.$trackDetail->image) }}" alt="Gambar biota" style="height:300px" class="img-fluid">
                        </div>
                    </div>                    

                    <div class="mb-4">
                        <label class="form-label" for="keterangan">Keterangan</label>
                        <textarea class="form-control @error('keterangan') is-invalid @enderror" type="text" id="keterangan" name="keterangan" rows="4" disabled>{{$trackDetail->keterangan}}</textarea>

                        @error('keterangan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label" for="map">Map</label>
                        <div id="map" class="@error('latitude') is-invalid @enderror @error('longitude') is-invalid @enderror" style="height: 400px;"></div>

                        @error('latitude')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        @error('longitude')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <input type="hidden" name="id_track" class="form-control" value="{{$track->id}}">
                    <input type="hidden" name="latitude" id="latitude" value="{{$trackDetail->latitude}}">
                    <input type="hidden" name="longitude" id="longitude" value="{{$trackDetail->longitude}}">
                    
                    @if (Route::is('admin.*'))
                        <a href="{{ route('admin.dashboard.track.detail.edit', [$trackDetail->id_track, $trackDetail->id]) }}"><button type="button" class="mt-1 btn btn-warning waves-effect waves-light">Edit</button></a>
                    @endif
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end row -->
@endsection
@section('script')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
<script>
    var latitude = parseFloat(document.getElementById('latitude').value);
    var longitude = parseFloat(document.getElementById('longitude').value);
    var map = L.map('map').setView([latitude, longitude], 10);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
    }).addTo(map);

    var detailTracksData = @json($trackDetailsData);
    var markers = {};

    detailTracksData.forEach(function(detailTrack) {
        var lat = detailTrack.latitude;
        var lng = detailTrack.longitude;
        var imageSrc = "{{ url('storage/') }}/" + detailTrack.image;
        var routeUrl = "{{ route('admin.dashboard.track.detail.show', ['id_track', 'id']) }}";
        routeUrl = routeUrl.replace('id_track', detailTrack.id_track).replace('id', detailTrack.id);
        var marker = L.marker([lat, lng]).addTo(map);

        var popupContent = `
            <div class="popup-container">
                <h6 class="popup-title">Track Details</h6>
                <ul>
                    <li><b>Biota:</b> ${detailTrack.biota.nama_biota}</li>
                    <li><b>Lokasi:</b> ${detailTrack.lokasi.nama_lokasi}</li>
                    <li><b>Keterangan:</b> ${detailTrack.keterangan}</li>
                    <li><a href="${routeUrl}" target="_blank" class="popup-link">Klik untuk informasi detail</a></li>
                </ul>
                <div class="image-container">
                    <img src="${imageSrc}" alt="Gambar biota" width="150px">
                </div>
            </div>
        `;

        if (!markers[lat]) {
            markers[lat] = {};
        }

        if (!markers[lat][lng]) {
            markers[lat][lng] = [];
        }

        markers[lat][lng].push(popupContent);
    });

    for (var lat in markers) {
        for (var lng in markers[lat]) {
            var marker = L.marker([lat, lng]).addTo(map);

            var combinedPopupContent = markers[lat][lng].join('<hr>'); // Combine popup content

            marker.on('mouseover', function(e) {
                this.bindPopup(combinedPopupContent).openPopup();
            });
        }
    }
</script>
@endsection
