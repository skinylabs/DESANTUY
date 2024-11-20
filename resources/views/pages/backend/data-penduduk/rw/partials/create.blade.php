<x-backend-layout>
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-semibold text-slate-800 mb-6">Register RT</h1>
        <form action="{{ route('rt.store') }}" method="POST">
            @csrf

            <!-- Nomor RT -->
            <div class="mb-6">
                <label for="nomer_rt" class="block text-sm font-medium text-gray-700">Nomor RT</label>
                <input type="text" name="nomer_rt" id="nomer_rt"
                    class="mt-2 p-2 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    value="{{ old('nomer_rt') }}" required>
                @error('nomer_rt')
                    <div class="text-red-600 text-sm mt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- Dusun -->
            <div class="mb-6">
                <label for="dusun_id" class="block text-sm font-medium text-gray-700">Dusun</label>
                <select name="dusun_id" id="dusun_id"
                    class="mt-2 p-2 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
                    <option value="" disabled selected>Pilih RW</option>
                    @foreach ($rws as $rw)
                        <option value="{{ $rw->id }}" {{ old('dusun_id') == $rw->id ? 'selected' : '' }}>
                            {{ $rw->name }}
                        </option>
                    @endforeach
                </select>
                @error('dusun_id')
                    <div class="text-red-600 text-sm mt-2">{{ $message }}</div>
                @enderror
            </div>
            <!-- Dusun -->
            <div class="mb-6">
                <label for="dusun_id" class="block text-sm font-medium text-gray-700">Dusun</label>
                <select name="dusun_id" id="dusun_id"
                    class="mt-2 p-2 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
                    <option value="" disabled selected>Pilih Dusun</option>
                    @foreach ($dusuns as $dusun)
                        <option value="{{ $dusun->id }}" {{ old('dusun_id') == $dusun->id ? 'selected' : '' }}>
                            {{ $dusun->name }}
                        </option>
                    @endforeach
                </select>
                @error('dusun_id')
                    <div class="text-red-600 text-sm mt-2">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit"
                class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 transition duration-300">
                Register RT
            </button>
        </form>
    </div>
</x-backend-layout>