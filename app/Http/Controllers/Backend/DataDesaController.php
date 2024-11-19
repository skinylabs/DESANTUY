<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\DataDesa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DataDesaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil semua data desa
        $dataDesa = DataDesa::all();
        // Mengecek apakah ada data desa atau tidak
        $isDataDesaExist = $dataDesa->isNotEmpty();
        return view('pages.backend.data-desa.index', compact('isDataDesaExist', 'dataDesa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('pages.backend.data-desa.partials.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_desa' => 'required|string|max:255',
            'nomer_hp' => 'required|string|min:10|max:15',
            'alamat' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'logo' => 'required|image|mimes:jpg,png,jpeg,gif|max:2048',
        ]);

        $logoPath = $request->file('logo')->store('logos', 'public');

        DataDesa::create([
            'nama_desa' => $request->nama_desa,
            'nomer_hp' => $request->nomer_hp,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'logo' => $logoPath,
        ]);

        return redirect()->route('data_desa.index')->with('success', 'Data desa berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(DataDesa $dataDesa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DataDesa $dataDesa)
    {
        return view('pages.backend.data-desa.partials.edit', compact('dataDesa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DataDesa $dataDesa)
    {
        $request->validate([
            'nama_desa' => 'required|string|max:255',
            'nomer_hp' => 'required|string|min:10|max:15,' . $dataDesa->id,
            'alamat' => 'required|string|max:255,',
            'email' => 'required|email|max:255,' . $dataDesa->id,
            'logo' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
        ]);

        if ($request->hasFile('logo')) {
            // Hapus logo lama
            Storage::disk('public')->delete($dataDesa->logo);

            // Upload logo baru
            $dataDesa->logo = $request->file('logo')->store('logos', 'public');
        }

        $dataDesa->update($request->except('logo'));

        return redirect()->route('data_desa.index')->with('success', 'Data desa berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DataDesa $dataDesa)
    {
        // Hapus logo
        Storage::disk('public')->delete($dataDesa->logo);

        $dataDesa->delete();

        return redirect()->route('data_desa.index')->with('success', 'Data desa berhasil dihapus.');
    }
}
