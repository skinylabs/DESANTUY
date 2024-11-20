<?php

namespace App\Http\Controllers\Backend\DataPenduduk;

use App\Http\Controllers\Controller;
use App\Models\DataPenduduk\KK;
use Illuminate\Http\Request;

class KkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kks = KK::all();
        return view('pages.backend.data-penduduk.kk.index', compact('kks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.backend.data-penduduk.kk.partials.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nomer_kk' => 'required|unique:kk,nomer_kk',
            'kepala_keluarga' => 'required',
            'alamat' => 'required',
            'jumlah_anggota_keluarga' => 'required|integer',
        ]);

        Kk::create($request->all());
        return redirect()->route('kk.index')->with('success', 'Kartu Keluarga created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kk $kk)
    {
        return view('pages.backend.data-penduduk.kk.partials.show', compact('kk'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kk $kk)
    {
        return view('pages.backend.data-penduduk.kk.partials.edit', compact('kk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kk $kk)
    {
        $request->validate([
            'nomer_kk' => 'required|unique:kk,nomer_kk,' . $kk->id,
            'kepala_keluarga' => 'required',
            'alamat' => 'required',
            'jumlah_anggota_keluarga' => 'required|integer',
        ]);

        $kk->update($request->all());
        return redirect()->route('kk.index')->with('success', 'Kartu Keluarga updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kk $kk)
    {
        $kk->delete();
        return redirect()->route('kk.index')->with('success', 'Kartu Keluarga deleted successfully');
    }
}
