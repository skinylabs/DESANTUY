<x-backend-layout>
    <div class="">
        <h1 class="text-3xl font-semibold text-slate-800 mb-6">Edit Data Desa</h1>
        <form action="{{ route('data-desa.update', $dataDesa->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Nama Desa -->
            <div class="mb-6">
                <label for="nama_desa" class="block text-sm font-medium text-gray-700">Nama Desa</label>
                <input type="text" id="nama_desa" name="nama_desa" value="{{ old('nama_desa', $dataDesa->nama_desa) }}"
                    class="mt-2 p-2 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
                @error('nama_desa')
                    <div class="text-red-600 text-sm mt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- Nomor HP -->
            <div class="mb-6">
                <label for="nomer_hp" class="block text-sm font-medium text-gray-700">No HP</label>
                <input type="text" id="nomer_hp" name="nomer_hp" value="{{ old('nomer_hp', $dataDesa->nomer_hp) }}"
                    class="mt-2 p-2 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
                @error('nomer_hp')
                    <div class="text-red-600 text-sm mt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- Alamat -->
            <div class="mb-6">
                <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                <textarea id="alamat" name="alamat"
                    class="mt-2 p-2 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>{{ old('alamat', $dataDesa->alamat) }}</textarea>
                @error('alamat')
                    <div class="text-red-600 text-sm mt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- Email -->
            <div class="mb-6">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email', $dataDesa->email) }}"
                    class="mt-2 p-2 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
                @error('email')
                    <div class="text-red-600 text-sm mt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- Logo -->
            <div class="mb-6">
                <label for="logo" class="block text-sm font-medium text-gray-700">Logo (Jika ingin mengganti logo,
                    upload gambar baru)</label>
                <input type="file" id="logo" name="logo"
                    class="mt-2 p-2 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                <div class="mt-3">
                    <label class="block text-sm font-medium text-gray-700">Logo Saat Ini:</label>
                    <img src="{{ asset('storage/' . $dataDesa->logo) }}" alt="Logo Desa" width="100" class="mt-2">
                </div>
                @error('logo')
                    <div class="text-red-600 text-sm mt-2">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit"
                class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 transition duration-300">Simpan
                Perubahan</button>
        </form>
    </div>
</x-backend-layout>
