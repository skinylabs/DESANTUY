<?php

namespace App\Http\Controllers\Backend\DataPenduduk;

use App\Http\Controllers\Controller;
use App\Models\DataPenduduk\Kk;
use App\Models\DataPenduduk\Ktp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KtpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ktps = Ktp::with('kk')->get();
        return view('pages.backend.data-penduduk.ktp.index', compact('ktps'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kks = Kk::all();
        return view('pages.backend.data-penduduk.ktp.partials.create', compact('kks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kk_id' => 'required|exists:kk,id',
            'nik' => 'required|unique:ktp,nik',
            'nama' => 'required',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'golongan_darah' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'pekerjaan' => 'required',
            'kewarganegaraan' => 'required',
            'pas_foto' => 'required|mimes:jpg,jpeg,png|max:2048',
        ]);

        $pas_foto_path = $request->file('pas_foto')->store('public/pas_foto');

        dd($request->all());
        Ktp::create([
            'kk_id' => $request->kk_id,
            'nik' => $request->nik,
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'golongan_darah' => $request->golongan_darah,
            'agama' => $request->agama,
            'alamat' => $request->alamat,
            'pekerjaan' => $request->pekerjaan,
            'kewarganegaraan' => $request->kewarganegaraan,
            'pas_foto' => $pas_foto_path,
        ]);

        return redirect()->route('ktp.index')->with('success', 'KTP berhasil ditambahkan.');
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
    public function edit($id)
    {
        $kks = Kk::all(); // Mendapatkan data KK untuk pilihan
        return view('pages.backend.data-penduduk.ktp.partials.edit', compact('ktp', 'kks'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $ktp = Ktp::findOrFail($id);

        $request->validate([
            'kk_id' => 'required|exists:kk,id',
            'nik' => 'required|unique:ktp,nik,' . $ktp->id,
            'nama' => 'required',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'golongan_darah' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'pekerjaan' => 'required',
            'kewarganegaraan' => 'required',
            'pas_foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = [
            'kk_id' => $request->kk_id,
            'nik' => $request->nik,
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'golongan_darah' => $request->golongan_darah,
            'agama' => $request->agama,
            'alamat' => $request->alamat,
            'pekerjaan' => $request->pekerjaan,
            'kewarganegaraan' => $request->kewarganegaraan,
        ];

        if ($request->hasFile('pas_foto')) {
            Storage::delete($ktp->pas_foto); // Hapus foto lama
            $data['pas_foto'] = $request->file('pas_foto')->store('public/pas_foto');
        }

        $ktp->update($data);

        return redirect()->route('ktp.index')->with('success', 'KTP berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ktp $ktp)
    {
        $ktp->delete();
        return redirect()->route('ktp.index')->with('success', 'Data KTP berhasil dihapus');
    }
}
