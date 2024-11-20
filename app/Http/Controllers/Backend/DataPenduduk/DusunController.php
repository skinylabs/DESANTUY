<?php

namespace App\Http\Controllers\Backend\DataPenduduk;

use App\Http\Controllers\Controller;
use App\Models\DataPenduduk\Dusun;
use Illuminate\Http\Request;

class DusunController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dusuns = Dusun::all();
        return view('pages.backend.data-penduduk.dusun.index', compact('dusuns'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.backend.data-penduduk.dusun.partials.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_dusun' => 'required|unique:dusun,nama_dusun',
        ]);

        Dusun::create($request->all());
        return redirect()->route('dusun.index')->with('success', 'Dusun created successfully');
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
        return view('dusun.edit', compact('dusun'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dusun $dusun)
    {
        $request->validate([
            'nomer_dusun' => 'required|unique:dusun,nomer_dusun,' . $dusun->id,
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
