<?php

namespace App\Http\Controllers;

use App\Models\Track;
use App\Models\TrackDetail;
use Illuminate\Http\Request;

class SigController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trackDetails = TrackDetail::join('tracks', 'track_details.id_track', '=', 'tracks.id')
        ->where('tracks.is_valid', '=', 1)
        ->get();
        return view('sig.index', compact("trackDetails"));
    }
}
