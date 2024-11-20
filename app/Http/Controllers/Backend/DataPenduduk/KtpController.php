<?php

namespace App\Http\Controllers\Backend\DataPenduduk;

use App\Http\Controllers\Controller;
use App\Models\DataPenduduk\Ktp;
use Illuminate\Http\Request;

class KtpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ktps = Ktp::all();
        return view('pages.backend.data-penduduk.ktp.index', compact('ktps'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.backend.data-penduduk.ktp.partials.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required|unique:ktp,nik',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required|date',
            'agama' => 'required',
        ]);

        Ktp::create($request->all());
        return redirect()->route('ktp.index')->with('success', 'KTP created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ktp $ktp)
    {
        return view('pages.backend.data-penduduk.ktp.partials.show', compact('ktp'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ktp $ktp)
    {
        return view('pages.backend.data-penduduk.ktp.partials.edit', compact('ktp'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ktp $ktp)
    {
        $request->validate([
            'nik' => 'required|unique:ktp,nik,' . $ktp->id,
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required|date',
            'agama' => 'required',
        ]);

        $ktp->update($request->all());
        return redirect()->route('ktp.index')->with('success', 'KTP updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ktp $ktp)
    {
        $ktp->delete();
        return redirect()->route('ktp.index')->with('success', 'KTP deleted successfully');
    }
}
