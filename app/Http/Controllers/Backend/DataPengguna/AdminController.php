<?php

namespace App\Http\Controllers\Backend\DataPengguna;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admins = User::where('role', 'admin')->get();
        return view('pages.backend.data-pengguna.admin.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.backend.data-pengguna.admin.partials.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        // Validasi input dari form
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'nik' => ['nullable', 'unique:users', 'string'],
            'phone' => ['nullable', 'string'],
            'address' => ['nullable', 'string'],
            'profile_picture' => ['nullable', 'image', 'max:2048'],
            'status' => ['nullable', 'boolean'],
        ]);

        // Menyimpan foto profil jika ada
        $profile_picture = null;
        if ($request->hasFile('profile_picture')) {
            $profile_picture = $request->file('profile_picture')->store('profile_pictures', 'public');
        }

        // Membuat admin baru dan menyimpan data
        $admin = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'nik' => $request->nik,
            'phone' => $request->phone,
            'address' => $request->address,
            'status' => $request->status ?? true,
            'role' => 'admin',
            'profile_picture' => $profile_picture,
        ]);

        // Memicu event registrasi
        event(new Registered($admin));

        // Mengalihkan ke halaman index admin
        return redirect(route('data_admin.index'))->with('success', 'Admin baru berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $admin)
    {
        // Detail admin jika diperlukan
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $data_admin)
    {
        return view('pages.backend.data-pengguna.admin.partials.edit', compact('data_admin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $data_admin): RedirectResponse
    {
        // Validasi input dari form
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $data_admin->id],
            'password' => ['nullable', 'confirmed', Rules\Password::defaults()],
            'nik' => ['nullable', 'unique:users,nik,' . $data_admin->id, 'string'],
            'phone' => ['nullable', 'string'],
            'address' => ['nullable', 'string'],
            'profile_picture' => ['nullable', 'image', 'max:2048'],
            'status' => ['nullable', 'boolean'],
        ]);

        // Mengupdate foto profil jika ada file baru
        if ($request->hasFile('profile_picture')) {
            // Hapus file lama jika ada
            if ($data_admin->profile_picture) {
                Storage::disk('public')->delete($data_admin->profile_picture);
            }
            $profile_picture = $request->file('profile_picture')->store('profile_pictures', 'public');
            $data_admin->profile_picture = $profile_picture;
        }

        // Mengupdate data admin
        $data_admin->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $data_admin->password,
            'nik' => $request->nik,
            'phone' => $request->phone,
            'address' => $request->address,
            'status' => $request->status ?? $data_admin->status,
        ]);

        return redirect()->route('data_admin.index')->with('success', 'Data admin berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $data_admin): RedirectResponse
    {
        // Hapus foto profil jika ada
        if ($data_admin->profile_picture) {
            Storage::disk('public')->delete($data_admin->profile_picture);
        }

        // Hapus admin dari database
        $data_admin->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('data_admin.index')->with('success', 'Admin berhasil dihapus.');
    }
}
