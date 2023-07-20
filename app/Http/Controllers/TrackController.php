<?php

namespace App\Http\Controllers;

use App\Models\Track;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:track', ['except' => ['indexNelayan']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tracks = Track::all();
        return view('track.index', compact("tracks"));
    }

    public function indexNelayan()
    {
        $tracks = Track::all();
        return view('track.index', compact("tracks"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('track.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $new = new Track();
        $new->id_staff = Auth::user()->id;
        $new->tanggal = $request->tanggal;
        $new->is_valid = 0;
        $new->save();

        return redirect()->route('dashboard.track.detail.index', $new->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Track  $track
     * @return \Illuminate\Http\Response
     */
    public function show(Track $track)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Track  $track
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $track = Track::find($id);
        return view('track.edit', compact("track"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Track  $track
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $new = Track::find($id);
        $new->tanggal = $request->tanggal;
        $new->save();

        return redirect()->route('dashboard.track.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Track  $track
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lokasi = Track::find($id);
        $lokasi->delete();

        return redirect()->route('dashboard.track.index');
    }
}
