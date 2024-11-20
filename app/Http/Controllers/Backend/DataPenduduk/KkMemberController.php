<?php

namespace App\Http\Controllers\Backend\DataPenduduk;

use App\Http\Controllers\Controller;
use App\Models\DataPenduduk\KK;
use App\Models\DataPenduduk\KKMember;
use App\Models\DataPenduduk\Ktp;
use Illuminate\Http\Request;

class KkMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kkMembers = KKMember::all();
        return view('kk_members.index', compact('kkMembers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kks = KK::all();
        $ktps = Ktp::all();
        return view('pages.backend.data-penduduk.kk-member.partials.create', compact('kks', 'ktps'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kk_id' => 'required',
            'ktp_id' => 'required',
            'relationship' => 'required',
        ]);

        KkMember::create($request->all());
        return redirect()->route('kk_members.index')->with('success', 'KK Member added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(KkMember $kkMember)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KkMember $kkMember)
    {
        $kks = Kk::all();
        $ktps = Ktp::all();
        return view('kk_members.edit', compact('kkMember', 'kks', 'ktps'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KkMember $kkMember)
    {
        $request->validate([
            'kk_id' => 'required',
            'ktp_id' => 'required',
            'relationship' => 'required',
        ]);

        $kkMember->update($request->all());
        return redirect()->route('kk_members.index')->with('success', 'KK Member updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KkMember $kkMember)
    {
        $kkMember->delete();
        return redirect()->route('kk_members.index')->with('success', 'KK Member deleted successfully');
    }
}
