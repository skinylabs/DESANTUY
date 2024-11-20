<?php

namespace App\Http\Controllers\Backend\DataPenduduk;

use App\Http\Controllers\Controller;
use App\Models\DataPenduduk\Dusun;
use App\Models\DataPenduduk\Rt;
use App\Models\DataPenduduk\Rw;
use Illuminate\Http\Request;

class RtController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rts = Rt::all();
        return view('pages.backend.data-penduduk.rt.index', compact('rts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dusuns = Dusun::all();
        $rws = Rw::all();
        return view('pages.backend.data-penduduk.rt.partials.create', compact('dusuns', 'rws'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nomer_rt' => 'required|unique:rt,nomer_rt',
        ]);

        Rt::create($request->all());
        return redirect()->route('rt.index')->with('success', 'RT created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Rt $rt)
    {
        return view('pages.backend.data-penduduk.rt.partials.show', compact('rt'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rt $rt)
    {
        return view('pages.backend.data-penduduk.rt.partials.edit', compact('rt'));
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
