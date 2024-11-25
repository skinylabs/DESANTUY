<x-admin-backend-layout>
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-semibold text-slate-800 mb-6">Edit RT</h1>
        <form action="{{ route('rt.update', $rt->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- Gunakan method PUT untuk update -->

            <!-- Nomor RT -->
            <div class="mb-6">
                <label for="nomer_rt" class="block text-sm font-medium text-gray-700">Nomor RT</label>
                <input type="text" name="nomer_rt" id="nomer_rt"
                    class="mt-2 p-2 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    value="{{ old('nomer_rt', $rt->nomer_rt) }}" required>
                @error('nomer_rt')
                    <div class="text-red-600 text-sm mt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- Pilih RW -->
            <div class="mb-6">
                <label for="rw_id" class="block text-sm font-medium text-gray-700">RW</label>
                <select name="rw_id" id="rw_id"
                    class="mt-2 p-2 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
                    <option value="" disabled>Pilih RW</option>
                    @foreach ($rws as $rw)
                        <option value="{{ $rw->id }}" {{ old('rw_id', $rt->rw_id) == $rw->id ? 'selected' : '' }}>
                            {{ $rw->nomer_rw }} - {{ $rw->dusun->nama_dusun }}
                        </option>
                    @endforeach
                </select>
                @error('rw_id')
                    <div class="text-red-600 text-sm mt-2">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit"
                class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 transition duration-300">
                Update RT
            </button>
        </form>
    </div>
</x-admin-backend-layout>
