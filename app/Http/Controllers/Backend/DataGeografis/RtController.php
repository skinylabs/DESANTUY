<?php

namespace App\Http\Controllers\Backend\DataGeografis;

use App\Http\Controllers\Controller;
use App\Models\DataGeografis\Dusun;
use App\Models\DataGeografis\Rt;
use App\Models\DataGeografis\Rw;
use Illuminate\Http\Request;

class RtController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rts = Rt::all();
        $rws = Rw::all();
        return view('pages.backend.data-geografis.rt.index', compact('rts', 'rws'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dusuns = Dusun::all();
        $rws = Rw::with('dusun')->get();
        return view('pages.backend.data-geografis.rt.partials.create', compact('dusuns', 'rws'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nomer_rt' => 'required|unique:rt,nomer_rt',
            'rw_id' => 'required|exists:rw,id', // Validasi rw_id harus valid
        ]);

        Rt::create([
            'nomer_rt' => $request->nomer_rt,
            'rw_id' => $request->rw_id,
        ]);

        return redirect()->route('rt.index')->with('success', 'RT berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Rt $rt)
    {
        return view('pages.backend.data-geografis.rt.partials.show', compact('rt',));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rt $rt)
    {

        $rws = Rw::all();
        return view('pages.backend.data-geografis.rt.partials.edit', compact('rt', 'rws'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rt $rt)
    {
        $request->validate([
            'nomer_rt' => 'required|unique:rt,nomer_rt,' . $rt->id,
        ]);

        $rt->update($request->all());
        return redirect()->route('rt.index')->with('success', 'RT updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rt $rt)
    {
        $rt->delete();
        return redirect()->route('rt.index')->with('success', 'RT deleted successfully');
    }
}
