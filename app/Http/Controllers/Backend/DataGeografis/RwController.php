<?php

namespace App\Http\Controllers\Backend\DataGeografis;

use App\Http\Controllers\Controller;
use App\Models\DataGeografis\Dusun;
use App\Models\DataGeografis\Rw;
use Illuminate\Http\Request;

class RwController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rws = Rw::all();
        return view('pages.backend.data-geografis.rw.index', compact('rws'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dusuns = Dusun::all();
        return view('pages.backend.data-geografis.rw.partials.create', compact('dusuns'));
    }

    /**
     * Store a newly created resource in storage. 
     */
    public function store(Request $request)
    {
        $request->validate([
            'nomer_rw' => 'required|unique:rw,nomer_rw',
            'dusun_id' => 'required|exists:dusun,id',
        ]);

        Rw::create($request->all());
        return redirect()->route('rw.index')->with('success', 'RW created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Rw $rw)
    {
        return view('pages.backend.data-geografis.rw.partials.show', compact('rw'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rw $rw)
    {
        $dusuns = Dusun::all();
        return view('pages.backend.data-geografis.rw.partials.edit', compact('rw', 'dusuns'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rw $rw)
    {
        $request->validate([

            'nomer_rw' => 'required|unique:rw,nomer_rw,' . $rw->id,
        ]);

        $rw->update($request->all());
        return redirect()->route('rw.index')->with('success', 'RW updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rw $rw)
    {
        $rw->delete();
        return redirect()->route('rw.index')->with('success', 'RW deleted successfully');
    }
}
