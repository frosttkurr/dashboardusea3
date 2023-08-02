<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Log;
use App\Models\JenisBiota;
use Illuminate\Http\Request;

class JenisBiotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:jenis-biota');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jenisBiotas = JenisBiota::all();
        return view('jenis-biota.index', compact("jenisBiotas"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jenis-biota.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'jenis_biota' => 'required|unique:jenis_biotas'
        ]);
        
        $new = new JenisBiota();
        $new->jenis_biota = $request->jenis_biota;
        $new->save();

        $log = new Log();
        $log->createLog(Auth::user()->name, 'create', 'Create new jenis biota data (ID: '.$new->id.' | Jenis Biota: '.$new->jenis_biota.')', '\App\JenisBiota', 'JenisBiotaController@store');

        return redirect()->route('admin.dashboard.jenis-biota.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JenisBiota  $jenisBiota
     * @return \Illuminate\Http\Response
     */
    public function show(JenisBiota $jenisBiota)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JenisBiota  $jenisBiota
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jenisBiota = JenisBiota::find($id);
        return view('jenis-biota.edit', compact("jenisBiota"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JenisBiota  $jenisBiota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'jenis_biota' => 'required|unique:jenis_biotas'
        ]);
        
        $new = JenisBiota::find($id);
        $new->jenis_biota = $request->jenis_biota;
        $new->save();

        $log = new Log();
        $log->createLog(Auth::user()->name, 'update', 'Update jenis biota data (ID: '.$new->id.' | Jenis Biota: '.$new->jenis_biota.')', '\App\JenisBiota', 'JenisBiotaController@update');

        return redirect()->route('admin.dashboard.jenis-biota.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JenisBiota  $jenisBiota
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jenisBiota = JenisBiota::find($id);
        $jenisBiota->delete();

        $log = new Log();
        $log->createLog(Auth::user()->name, 'delete', 'Delete jenis biota data (ID: '.$jenisBiota->id.' | Jenis Biota: '.$jenisBiota->jenis_biota.')', '\App\JenisBiota', 'JenisBiotaController@destroy');

        return redirect()->route('admin.dashboard.jenis-biota.index');
    }
}
