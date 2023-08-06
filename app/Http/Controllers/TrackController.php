<?php

namespace App\Http\Controllers;

use App\Models\Track;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Log;
use App\Models\TrackDetail;

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
        return view('track.nelayan.index', compact("tracks"));
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
        $validateData = $request->validate([
            'tanggal' => 'required'
        ]);

        $new = new Track();
        $new->id_staff = Auth::user()->id;
        $new->tanggal = $request->tanggal;
        $new->is_valid = 0;
        $new->save();

        $log = new Log();
        $log->createLog(Auth::user()->name, 'create', 'Create new track data (ID: '.$new->id.' | Tanggal: '.$new->tanggal.')', '\App\Track', 'TrackController@store');

        return redirect()->route('admin.dashboard.track.detail.index', $new->id);
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
        $validateData = $request->validate([
            'tanggal' => 'required'
        ]);

        $new = Track::find($id);
        $new->tanggal = $request->tanggal;
        $new->save();

        $log = new Log();
        $log->createLog(Auth::user()->name, 'update', 'Update track data (ID: '.$new->id.' | Tanggal: '.$new->tanggal.')', '\App\Track', 'TrackController@update');

        return redirect()->route('admin.dashboard.track.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Track  $track
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $track = Track::find($id);
        
        $track_details = TrackDetail::where('id_track', $track->id)->get();
        foreach ($track_details as $track_detail) {
            $track_detail->destroy($track_detail->id);
        }

        $track->delete();

        $log = new Log();
        $log->createLog(Auth::user()->name, 'delete', 'Delete track data (ID: '.$track->id.' | Tanggal: '.$track->tanggal.')', '\App\Track', 'TrackController@destroy');

        return redirect()->route('admin.dashboard.track.index');
    }

    public function ajaxUpdate(Request $request, $id)
    {
        $new = Track::find($id);
        $new->is_valid = $request->is_valid;

        if ($new->save()) {
            $log = new Log();
            $status = ($new->is_valid == 1) ? 'Valid' : 'Belum Valid';
            $logMessage = 'Update status track data (ID: ' . $new->id . ' | Status: ' . $status . ')';
            $log->createLog(Auth::user()->name, 'update', $logMessage, '\App\Track', 'TrackController@ajaxUpdate');
            
            return [true, $new->is_valid];
        } else {
            return [false, $new->is_valid];
        }
    }
}
