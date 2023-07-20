<?php

namespace App\Http\Controllers;

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
        // dd('ppp');
        $new = new JenisBiota();
        $new->jenis_biota = $request->jenis_biota;
        $new->save();

        return redirect()->route('dashboard.jenis-biota.index');
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
        $new = JenisBiota::find($id);
        $new->jenis_biota = $request->jenis_biota;
        $new->save();

        return redirect()->route('dashboard.jenis-biota.index');
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

        return redirect()->route('dashboard.jenis-biota.index');
    }
}
