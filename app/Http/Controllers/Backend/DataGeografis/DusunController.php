<?php

namespace App\Http\Controllers\Backend\DataGeografis;

use App\Http\Controllers\Controller;
use App\Models\DataGeografis\Dusun;
use Illuminate\Http\Request;

class DusunController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dusuns = Dusun::all();
        return view('pages.backend.data-geografis.dusun.index', compact('dusuns'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.backend.data-geografis.dusun.partials.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_dusun' => 'required|unique:dusun,nama_dusun',
        ]);

        try {
            Dusun::create($request->all());
            // Flash message success
            session()?->flash('message', 'Dusun berhasil dibuat.');
            session()?->flash('type', 'success'); // Menentukan tipe 'success'
        } catch (\Exception $e) {
            // Flash message error
            session()?->flash('message', 'Gagal membuat dusun: ' . $e->getMessage());
            session()?->flash('type', 'error'); // Menentukan tipe 'error'
        }

        return redirect()->route('dusun.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Dusun $dusun)
    {
        return view('dusun.show', compact('dusun'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dusun $dusun)
    {
        return view('pages.backend.data-geografis.dusun.partials.edit', compact('dusun'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dusun $dusun)
    {
        $request->validate([
            'nama_dusun' => 'required|unique:dusun,nama_dusun,' . $dusun->id,
        ]);

        $dusun->update($request->all());
        return redirect()->route('dusun.index')->with('success', 'Dusun updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dusun $dusun)
    {
        $dusun->delete();
        return redirect()->route('dusun.index')->with('success', 'Dusun deleted successfully');
    }
}
