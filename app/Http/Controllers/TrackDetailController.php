<?php

namespace App\Http\Controllers;

use App\Models\Biota;
use App\Models\Lokasi;
use App\Models\TrackDetail;
use Illuminate\Http\Request;

class TrackDetailController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $trackId = $id;
        $trackDetails = TrackDetail::where('id_track', $id)->get();
        return view('track.detail.index', compact("trackDetails", "trackId"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $trackId = $id;
        $lokasis = Lokasi::all();
        $biotas = Biota::all();
        return view('track.detail.create', compact("lokasis", "biotas", "trackId"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $new = new TrackDetail();
        $new->id_track = $request->id_track;
        $new->id_biota = $request->id_biota;
        $new->id_lokasi = $request->id_lokasi;
        $new->keterangan = $request->keterangan;

        $path = $request->file('image')->store('track-details', 'public');

        $new->image = $path;
        $new->save();   

        return redirect()->route('dashboard.track.detail.index', $request->id_track);
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
    public function edit($id, $detail)
    {
        $trackDetail = TrackDetail::find($detail);
        $lokasis = Lokasi::all();
        $biotas = Biota::all();
        return view('track.detail.edit',compact("id", "trackDetail", "lokasis", "biotas"));
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
        $new = TrackDetail::find($detail);
        $new->id_track = $request->id_track;
        $new->id_biota = $request->id_biota;
        $new->id_lokasi = $request->id_lokasi;
        $new->keterangan = $request->keterangan;

        if($request->file('image')){
            $path = $request->file('image')->store('/track-details');
            $new->image = $path;
        }

        $new->save();

        return redirect()->route('dashboard.track.detail.index', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TrackDetail  $trackDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $detail)
    {
        $lokasi = TrackDetail::find($detail);
        $lokasi->delete();

        return redirect()->route('dashboard.track.detail.index', $id);
    }
}
