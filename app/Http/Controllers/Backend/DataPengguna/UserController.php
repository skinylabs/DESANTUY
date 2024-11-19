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

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('role', 'user')->get();
        return view('pages.backend.data-pengguna.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.backend.data-pengguna.user.partials.create');
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

        // Membuat pengguna baru dan menyimpan data
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'nik' => $request->nik,
            'phone' => $request->phone,
            'address' => $request->address,
            'status' => $request->status ?? true,
            'profile_picture' => $profile_picture,
        ]);

        // Memicu event registrasi dan login otomatis
        event(new Registered($user));
        Auth::login($user);

        // Mengalihkan ke halaman dashboard
        return redirect(route('dashboard'));
    }

    /**
     * Display the specified resource.
     */
    public function show(User $users)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $data_user)
    {
        return view('pages.backend.data-pengguna.user.partials.edit', compact('data_user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $data_user): RedirectResponse
    {
        // Validasi input dari form
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $data_user->id],
            'password' => ['nullable', 'confirmed', Rules\Password::defaults()],
            'nik' => ['nullable', 'unique:users,nik,' . $data_user->id, 'string'],
            'phone' => ['nullable', 'string'],
            'address' => ['nullable', 'string'],
            'profile_picture' => ['nullable', 'image', 'max:2048'],
            'status' => ['nullable', 'boolean'],
        ]);

        // Mengupdate foto profil jika ada file baru
        if ($request->hasFile('profile_picture')) {
            // Hapus file lama jika ada
            if ($data_user->profile_picture) {
                Storage::disk('public')->delete($data_user->profile_picture);
            }
            $profile_picture = $request->file('profile_picture')->store('profile_pictures', 'public');
            $data_user->profile_picture = $profile_picture;
        }

        // Mengupdate data pengguna
        $data_user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $data_user->password,
            'nik' => $request->nik,
            'phone' => $request->phone,
            'address' => $request->address,
            'status' => $request->status ?? $data_user->status,
        ]);

        return redirect()->route('data_user.index')->with('success', 'Data pengguna berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $data_user): RedirectResponse
    {
        // Hapus foto profil jika ada
        if ($data_user->profile_picture) {
            Storage::disk('public')->delete($data_user->profile_picture);
        }

        // Hapus pengguna dari database
        $data_user->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('data_user.index')->with('success', 'Data pengguna berhasil dihapus.');
    }
}
