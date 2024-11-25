<x-admin-backend-layout>
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-semibold text-slate-800 mb-6">Edit RW</h1>
        <form action="{{ route('rw.update', $rw->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- Gunakan method PUT untuk update -->

            <!-- Dusun -->
            <div class="mb-6">
                <label for="dusun_id" class="block text-sm font-medium text-gray-700">Dusun</label>
                <select name="dusun_id" id="dusun_id"
                    class="mt-2 p-2 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
                    <option value="" disabled>Pilih Dusun</option>
                    @foreach ($dusuns as $dusun)
                        <option value="{{ $dusun->id }}"
                            {{ old('dusun_id', $rw->dusun_id) == $dusun->id ? 'selected' : '' }}>
                            {{ $dusun->nama_dusun }}
                        </option>
                    @endforeach
                </select>
                @error('dusun_id')
                    <div class="text-red-600 text-sm mt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- Nomor RW -->
            <div class="mb-6">
                <label for="nomer_rw" class="block text-sm font-medium text-gray-700">Nomor RW</label>
                <input type="text" name="nomer_rw" id="nomer_rw"
                    class="mt-2 p-2 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    value="{{ old('nomer_rw', $rw->nomer_rw) }}" required>
                @error('nomer_rw')
                    <div class="text-red-600 text-sm mt-2">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit"
                class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 transition duration-300">
                Update RW
            </button>
        </form>
    </div>
</x-admin-backend-layout>
