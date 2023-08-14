<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Log;
use App\Models\Biota;
use App\Models\JenisBiota;
use Illuminate\Http\Request;
use App\Models\TrackDetail;

class BiotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:biota', ['except' => ['indexNelayan']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $biotas = Biota::all();
        return view('biota.index', compact("biotas"));
    }

    public function indexNelayan()
    {
        $biotas = Biota::all();
        return view('biota.nelayan.index', compact("biotas"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jenisBiotas = JenisBiota::all();
        return view('biota.create', compact("jenisBiotas"));
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
            'nama_biota' => 'required',
            'id_jenis_biota' => 'required',
            'deskripsi' => 'required',
            'image' => ['required', 'image','mimes:jpg,jpeg,png'],
        ]);

        $new = new Biota();
        $new->nama_biota = $request->nama_biota;
        $new->id_jenis_biota = $request->id_jenis_biota;
        $new->deskripsi = $request->deskripsi;

        if($request->file('image')){
            $path = $request->file('image')->store('biotas', 'public');
            $new->image = $path;
        }
        $new->save();

        $log = new Log();
        $log->createLog(Auth::user()->name, 'create', 'Create new biota data (ID: '.$new->id.' | Name: '.$new->nama_biota.')', '\App\Biota', 'BiotaController@store');

        return redirect()->route('admin.dashboard.biota.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Biota  $biota
     * @return \Illuminate\Http\Response
     */
    public function show(Biota $biota)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Biota  $biota
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $biota = Biota::find($id);
        $jenisBiotas = JenisBiota::all();
        return view('biota.edit', compact("biota","jenisBiotas"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Biota  $biota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'nama_biota' => 'required',
            'id_jenis_biota' => 'required',
            'deskripsi' => 'required',
            'image' => ['image','mimes:jpg,jpeg,png'],
        ]);
        
        $new = Biota::find($id);
        $new->nama_biota = $request->nama_biota;
        $new->id_jenis_biota = $request->id_jenis_biota;
        $new->deskripsi = $request->deskripsi;
        
        if($request->file('image')){
            $path = $request->file('image')->store('biotas', 'public');
            $new->image = $path;
        }
        $new->save();

        $log = new Log();
        $log->createLog(Auth::user()->name, 'update', 'Update biota data (ID: '.$id.' | Name: '.$new->nama_biota.')', '\App\Biota', 'BiotaController@update');

        return redirect()->route('admin.dashboard.biota.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Biota  $biota
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $biota = Biota::find($id);
        $biota->delete();

        $log = new Log();
        $log->createLog(Auth::user()->name, 'delete', 'Delete biota data (ID: '.$id.' | Name: '.$biota->nama_biota.')', '\App\Biota', 'BiotaController@destroy');
        
        $track_details = TrackDetail::where('id_biota', $id)->get();
        foreach ($track_details as $track_detail) {
            $track_detail->delete();

            $log = new Log();
            $log->createLog(Auth::user()->name, 'delete', 'Delete track detail data (ID: '.$track_detail->id.' | ID Track: '.$track_detail->id_track.')', '\App\TrackDetail', 'TrackDetailController@destroy');
        }

        return redirect()->route('admin.dashboard.biota.index');
    }
}
