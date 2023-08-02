<?php

namespace App\Http\Controllers;

use App\Models\JenisTemuanNelayan;
use Illuminate\Http\Request;
use Auth;
use App\Models\Log;

class JenisTemuanNelayanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:jenis-temuan');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jenisTemuans = JenisTemuanNelayan::all();
        return view('jenis-temuan.index', compact("jenisTemuans"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jenis-temuan.create');
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
            'jenis_temuan' => 'required'
        ]);

        $new = new JenisTemuanNelayan();
        $new->jenis_temuan = $request->jenis_temuan;
        $new->save();

        $log = new Log();
        $log->createLog(Auth::user()->name, 'create', 'Create new jenis temuan data (ID: '.$new->id.' | Jenis Temuan: '.$new->jenis_temuan.')', '\App\JenisTemuan', 'JenisTemuanController@store');

        return redirect()->route('admin.dashboard.jenis-temuan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JenisTemuanNelayan  $jenisTemuanNelayan
     * @return \Illuminate\Http\Response
     */
    public function show(JenisTemuanNelayan $jenisTemuanNelayan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JenisTemuanNelayan  $jenisTemuanNelayan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jenisTemuan = JenisTemuanNelayan::find($id);
        return view('jenis-temuan.edit', compact("jenisTemuan"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JenisTemuanNelayan  $jenisTemuanNelayan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'jenis_temuan' => 'required'
        ]);
        
        $new = JenisTemuanNelayan::find($id);
        $new->jenis_temuan = $request->jenis_temuan;
        $new->save();

        $log = new Log();
        $log->createLog(Auth::user()->name, 'update', 'Update jenis temuan data (ID: '.$new->id.' | Jenis Temuan: '.$new->jenis_temuan.')', '\App\JenisTemuan', 'JenisTemuanController@update');

        return redirect()->route('admin.dashboard.jenis-temuan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JenisTemuanNelayan  $jenisTemuanNelayan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jenisTemuan = JenisTemuanNelayan::find($id);
        $jenisTemuan->delete();

        $log = new Log();
        $log->createLog(Auth::user()->name, 'delete', 'Delete jenis temuan data (ID: '.$jenisTemuan->id.' | Jenis Temuan: '.$jenisTemuan->jenis_temuan.')', '\App\JenisTemuan', 'JenisTemuanController@destroy');

        return redirect()->route('admin.dashboard.jenis-temuan.index');
    }
}
