<?php

namespace App\Http\Controllers;

use App\Models\Biota;
use App\Models\JenisBiota;
use Illuminate\Http\Request;

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
        return view('biota.indexNelayan', compact("biotas"));
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
        $image_path = $request->file('image')->store('image', 'public');
        $new = new Biota();
        $new->nama_biota = $request->nama_biota;
        $new->id_jenis_biota = $request->id_jenis_biota;
        $new->deskripsi = $request->deskripsi;
        $new->image = $image_path;
        $new->save();

        return redirect()->route('dashboard.biota.index');
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
        $new = Biota::find($id);
        $new->nama_biota = $request->nama_biota;
        $new->save();

        return redirect()->route('dashboard.biota.index');
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

        return redirect()->route('dashboard.biota.index');
    }
}
