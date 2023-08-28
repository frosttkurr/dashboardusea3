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
        ->join('biotas', 'track_details.id_biota', '=', 'biotas.id')
        ->join('lokasis', 'track_details.id_lokasi', '=', 'lokasis.id')
        ->where('tracks.is_valid', '=', 1)
        ->get();
        return view('sig.index', compact("trackDetails"));
    }
}
