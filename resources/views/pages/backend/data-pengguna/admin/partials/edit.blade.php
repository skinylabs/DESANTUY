<x-backend-layout>
    <div>
        <h1 class="text-3xl font-semibold mb-6">Edit Data Pengguna</h1>
        <form action="{{ route('data_user.update', $data_user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Nama -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                <input type="text" id="name" name="name" value="{{ old('name', $data_user->name) }}"
                    class="w-full p-2 border rounded mt-2" required>
                @error('name')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email', $data_user->email) }}"
                    class="w-full p-2 border rounded mt-2" required>
                @error('email')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Password (Opsional)</label>
                <input type="password" id="password" name="password" class="w-full p-2 border rounded mt-2">
                @error('password')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Konfirmasi Password -->
            <div class="mb-4">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi
                    Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation"
                    class="w-full p-2 border rounded mt-2">
            </div>

            <!-- Foto Profil -->
            <div class="mb-4">
                <label for="profile_picture" class="block text-sm font-medium text-gray-700">Foto Profil</label>
                <input type="file" id="profile_picture" name="profile_picture"
                    class="w-full p-2 border rounded mt-2">
                @if ($data_user->profile_picture)
                    <img src="{{ asset('storage/' . $data_user->profile_picture) }}" alt="Foto Profil"
                        class="w-20 h-20 mt-4">
                @endif
                @error('profile_picture')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
                Simpan Perubahan
            </button>
        </form>
    </div>
</x-backend-layout>
