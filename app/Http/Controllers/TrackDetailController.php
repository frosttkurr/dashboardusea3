<?php

namespace App\Http\Controllers;

use App\Models\Biota;
use App\Models\Lokasi;
use App\Models\Track;
use App\Models\TrackDetail;
use Illuminate\Http\Request;
use Auth;
use App\Models\Log;

class TrackDetailController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $track = Track::find($id);
        $trackDetails = TrackDetail::where('id_track', $id)->get();
        return view('track.detail.index', compact("trackDetails", "track"));
    }

    public function indexNelayan($id)
    {
        $track = Track::find($id);
        $trackDetails = TrackDetail::where('id_track', $id)->get();
        return view('track.nelayan.detail', compact("trackDetails", "track"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $track = Track::find($id);
        $lokasis = Lokasi::all();
        $biotas = Biota::all();
        return view('track.detail.create', compact("lokasis", "biotas", "track"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'id_track' => 'required',
            'id_biota' => 'required',
            'id_lokasi' => 'required',
            'keterangan' => 'required',
            'image' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
        ]);

        $new = new TrackDetail();
        $new->id_track = $request->id_track;
        $new->id_biota = $request->id_biota;
        $new->id_lokasi = $request->id_lokasi;
        $new->keterangan = $request->keterangan;
        $new->latitude = $request->latitude;
        $new->longitude = $request->longitude;

        if($request->file('image')){
            $path = $request->file('image')->store('track-details', 'public');
            $new->image = $path;
        }
        $new->save();

        $log = new Log();
        $log->createLog(Auth::user()->name, 'create', 'Create new track detail data (ID: '.$new->id.' | ID Track: '.$new->id_track.')', '\App\TrackDetail', 'TrackDetailController@store');

        return redirect()->route('admin.dashboard.track.detail.index', $request->id_track);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TrackDetail  $trackDetail
     * @return \Illuminate\Http\Response
     */
    public function show(TrackDetail $trackDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TrackDetail  $trackDetail
     * @return \Illuminate\Http\Response
     */
    public function edit($track_id, $track_detail_id)
    {
        $track = Track::find($track_id);
        $trackDetail = TrackDetail::find($track_detail_id);
        $lokasis = Lokasi::all();
        $biotas = Biota::all();
        return view('track.detail.edit',compact("track", "trackDetail", "lokasis", "biotas"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TrackDetail  $trackDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $detail)
    {
        $validateData = $request->validate([
            'id_track' => 'required',
            'id_biota' => 'required',
            'id_lokasi' => 'required',
            'keterangan' => 'required',
        ]);

        $new = TrackDetail::find($detail);
        $new->id_track = $request->id_track;
        $new->id_biota = $request->id_biota;
        $new->id_lokasi = $request->id_lokasi;
        $new->keterangan = $request->keterangan;

        if($request->file('image')){
            $path = $request->file('image')->store('track-details', 'public');
            $new->image = $path;
        }
        $new->save();

        $log = new Log();
        $log->createLog(Auth::user()->name, 'update', 'Update track detail data (ID: '.$new->id.' | ID Track: '.$new->id_track.')', '\App\TrackDetail', 'TrackDetailController@update');

        return redirect()->route('admin.dashboard.track.detail.index', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TrackDetail  $trackDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $detail)
    {
        $track_detail = new TrackDetail;
        $track_detail->destroy($detail);
        
        return redirect()->route('admin.dashboard.track.detail.index', $id);
    }
}
