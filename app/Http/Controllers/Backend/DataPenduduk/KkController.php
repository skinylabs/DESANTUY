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
        $kks = Kk::all();
        return view('pages.backend.data-geografis.kk.index', compact('kks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.backend.data-geografis.kk.partials.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nomer_kk' => 'required|unique:kk,nomer_kk',
            'nik' => 'required',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'golongan_darah' => 'required',
            'agama' => 'required',
            'status_perkawinan' => 'required',
            'status_hubungan_keluarga' => 'required',
        ]);

        $kk = new Kk($request->all());
        $kk->save();

        return redirect()->route('kk.index')->with('success', 'KK berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kk $kk)
    {
        return view('pages.backend.data-geografis.kk.partials.show', compact('kk'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kk = Kk::findOrFail($id);
        return view('pages.backend.data-geografis.kk.partials.edit', compact('kk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nomer_kk' => 'required|unique:kk,nomer_kk,' . $id,
            'nik' => 'required',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'golongan_darah' => 'required',
            'agama' => 'required',
            'status_perkawinan' => 'required',
            'status_hubungan_keluarga' => 'required',
        ]);

        $kk = Kk::findOrFail($id);
        $kk->update($request->all());

        return redirect()->route('kk.index')->with('success', 'KK berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $kk = Kk::findOrFail($id);
        $kk->delete();

        return redirect()->route('kk.index')->with('success', 'KK berhasil dihapus!');
    }
}
