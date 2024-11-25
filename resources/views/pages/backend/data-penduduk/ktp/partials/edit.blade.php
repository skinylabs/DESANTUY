<x-admin-backend-layout>
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-semibold text-slate-800 mb-6">Edit Dusun</h1>
        <form action="{{ route('dusun.update', $dusun->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- Menggunakan method PUT untuk update -->

            <!-- Nama Dusun -->
            <div class="mb-6">
                <label for="nama_dusun" class="block text-sm font-medium text-gray-700">Nama Dusun</label>
                <input type="text" name="nama_dusun" id="nama_dusun"
                    class="mt-2 p-2 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    value="{{ old('nama_dusun', $dusun->nama_dusun) }}" required> <!-- Menampilkan data lama -->
                @error('nama_dusun')
                    <div class="text-red-600 text-sm mt-2">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit"
                class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 transition duration-300">
                Update Dusun
            </button>
        </form>
    </div>
</x-admin-backend-layout>
